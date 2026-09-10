import './bootstrap';

import Alpine from 'alpinejs';
import gsap from 'gsap';

window.Alpine = Alpine;

Alpine.start();


// =========================================================
// MAIN
// =========================================================

document.addEventListener('DOMContentLoaded', () => {

    // =====================================================
    // SCROLL REVEAL
    // =====================================================

    const revealElements =
        document.querySelectorAll('.reveal');

    if (revealElements.length) {

        const observer =
            new IntersectionObserver((entries) => {

                entries.forEach((entry) => {

                    if (entry.isIntersecting) {

                        entry.target.classList.add('active');

                        observer.unobserve(entry.target);
                    }

                });

            }, {
                threshold: 0.15
            });

        revealElements.forEach((element) => {
            observer.observe(element);
        });
    }


    // =====================================================
    // PROJECT SLIDER
    // =====================================================

    const track =
        document.querySelector('.projects-track');

    const previousButton =
        document.querySelector('.slider-prev');

    const nextButton =
        document.querySelector('.slider-next');

    const dotsContainer =
        document.querySelector('.slider-dots');


    if (track && previousButton && nextButton) {

        const projects =
            Array.from(
                track.querySelectorAll('.project')
            );

        let currentIndex = 0;


        function getVisibleCount() {

            if (window.innerWidth <= 650) {
                return 1;
            }

            if (window.innerWidth <= 1000) {
                return 2;
            }

            return 3;
        }


        function updateSlider() {

            if (!projects.length) {
                return;
            }

            const visibleCount =
                getVisibleCount();

            const maxIndex =
                Math.max(
                    projects.length -
                    visibleCount,
                    0
                );

            currentIndex =
                Math.min(
                    currentIndex,
                    maxIndex
                );


            const project =
                projects[currentIndex];

            if (!project) {
                return;
            }


            const offset =
                project.offsetLeft -
                track.offsetLeft;


            track.scrollTo({
                left: offset,
                behavior: 'smooth'
            });


            if (dotsContainer) {

                dotsContainer.innerHTML = '';

                const pages =
                    Math.ceil(
                        projects.length /
                        visibleCount
                    );


                for (
                    let i = 0;
                    i < pages;
                    i++
                ) {

                    const dot =
                        document.createElement('span');

                    dot.className =
                        'slider-dot';


                    if (
                        i ===
                        Math.floor(
                            currentIndex /
                            visibleCount
                        )
                    ) {
                        dot.classList.add('active');
                    }


                    dot.addEventListener(
                        'click',
                        () => {

                            currentIndex =
                                i *
                                visibleCount;

                            updateSlider();

                        }
                    );


                    dotsContainer.appendChild(dot);
                }
            }
        }


        nextButton.addEventListener(
            'click',
            () => {

                const visibleCount =
                    getVisibleCount();

                const maxIndex =
                    Math.max(
                        projects.length -
                        visibleCount,
                        0
                    );


                if (
                    currentIndex <
                    maxIndex
                ) {

                    currentIndex +=
                        visibleCount;

                    currentIndex =
                        Math.min(
                            currentIndex,
                            maxIndex
                        );

                    updateSlider();
                }
            }
        );


        previousButton.addEventListener(
            'click',
            () => {

                const visibleCount =
                    getVisibleCount();

                currentIndex =
                    Math.max(
                        currentIndex -
                        visibleCount,
                        0
                    );

                updateSlider();
            }
        );


        window.addEventListener(
            'resize',
            updateSlider
        );


        updateSlider();
    }



    // =========================================================
    // ROAMING STICKMAN
    // =========================================================

    const character =
        document.querySelector(
            '.roaming-stickman'
        );

    const stickman =
        document.querySelector(
            '.mini-stickman'
        );

    const body =
        document.querySelector(
            '.mini-body'
        );

    const armLeft =
        document.querySelector(
            '.mini-arm-left'
        );

    const armRight =
        document.querySelector(
            '.mini-arm-right'
        );

    const legLeft =
        document.querySelector(
            '.mini-leg-left'
        );

    const legRight =
        document.querySelector(
            '.mini-leg-right'
        );

    const web =
        document.querySelector(
            '.mini-web'
        );


    if (
        !character ||
        !stickman ||
        !body ||
        !armLeft ||
        !armRight ||
        !legLeft ||
        !legRight
    ) {
        return;
    }


    // =========================================================
    // SETTINGS
    // =========================================================

    const CHAR_WIDTH = 40;
    const CHAR_HEIGHT = 48;

    const SAFE_TOP = 70;
    const SAFE_BOTTOM = 55;

    const MIN_DISTANCE = 70;
    const MAX_DISTANCE = 650;

    const IDLE_MIN = 900;
    const IDLE_MAX = 2200;


    // =========================================================
    // STATE
    // =========================================================

    let currentX = 30;
    let currentY = 250;

    let previousSurface = null;
    let currentSurface = null;

    let moving = false;
    let scrolling = false;

    let lastScroll =
        window.scrollY;

    let scrollTimer = null;

    let surfaces = [];


    // =========================================================
    // INITIAL CHARACTER STATE
    // =========================================================

    gsap.set(character, {
        x: currentX,
        y: currentY,
        scaleX: 1
    });


    gsap.set(stickman, {
        transformOrigin: 'center bottom'
    });


    gsap.set(body, {
        transformOrigin: 'top center',
        rotation: 0,
        y: 0,
        scaleY: 1
    });


    gsap.set(armLeft, {
        rotation: 140,
        transformOrigin: 'left center'
    });


    gsap.set(armRight, {
        rotation: 40,
        transformOrigin: 'left center'
    });


    gsap.set(legLeft, {
        rotation: 120,
        transformOrigin: 'left center'
    });


    gsap.set(legRight, {
        rotation: 60,
        transformOrigin: 'left center'
    });


    character.classList.add('visible');


    // =========================================================
    // HELPERS
    // =========================================================

    function clamp(
        value,
        min,
        max
    ) {

        return Math.max(
            min,
            Math.min(
                max,
                value
            )
        );
    }


    function distance(
        a,
        b
    ) {

        return Math.sqrt(
            Math.pow(
                b.x - a.x,
                2
            ) +
            Math.pow(
                b.y - a.y,
                2
            )
        );
    }


    function random(
        min,
        max
    ) {

        return (
            Math.random() *
            (max - min)
        ) + min;
    }


    // =========================================================
    // FIND LETTER SURFACES
    // =========================================================

    function collectLetterSurfaces() {

        const selectors = [

            '.hero h1',
            '.hero h2',
            '.hero p',

            '.section-title h2',
            '.section-title p',

            '.about-text h3',
            '.about-text p',

            '.about-detail strong',
            '.about-detail p',

            '.terminal-category',
            '.terminal-skill',
            '.terminal-prompt',

            '.project-content h3',
            '.project-content p',

            '.project-tags span',
            '.project-link',

            '.btn'
        ];


        const elements =
            document.querySelectorAll(
                selectors.join(',')
            );


        const found = [];


        elements.forEach(
            (element) => {

                const text =
                    element.textContent.trim();

                if (!text) {
                    return;
                }


                const walker =
                    document.createTreeWalker(
                        element,
                        NodeFilter.SHOW_TEXT
                    );


                const textNodes = [];

                let node;


                while (
                    node =
                    walker.nextNode()
                ) {

                    textNodes.push(node);
                }


                textNodes.forEach(
                    (textNode) => {

                        const value =
                            textNode.textContent;


                        for (
                            let i = 0;
                            i < value.length;
                            i++
                        ) {

                            if (
                                /\s/.test(
                                    value[i]
                                )
                            ) {
                                continue;
                            }


                            const range =
                                document.createRange();


                            range.setStart(
                                textNode,
                                i
                            );


                            range.setEnd(
                                textNode,
                                i + 1
                            );


                            const rect =
                                range.getBoundingClientRect();


                            if (
                                rect.width < 1 ||
                                rect.height < 1
                            ) {
                                continue;
                            }


                            if (
                                rect.bottom <
                                SAFE_TOP
                            ) {
                                continue;
                            }


                            if (
                                rect.top >
                                window.innerHeight -
                                SAFE_BOTTOM
                            ) {
                                continue;
                            }


                            found.push({

                                x:
                                    rect.left +
                                    rect.width / 2,

                                y:
                                    rect.top - 4,

                                width:
                                    rect.width,

                                height:
                                    rect.height,

                                type:
                                    'letter',

                                element

                            });


                            range.detach();
                        }
                    }
                );
            }
        );


        return found;
    }


    // =========================================================
    // FIND ELEMENT SURFACES
    // =========================================================

    function collectElementSurfaces() {

        const selectors = [

            '.about-card',
            '.about-code',
            '.about-detail',

            '.terminal-window',

            '.project',
            '.project-image-wrapper',
            '.project-content',

            '.btn'
        ];


        const elements =
            document.querySelectorAll(
                selectors.join(',')
            );


        const found = [];


        elements.forEach(
            (element) => {

                const rect =
                    element.getBoundingClientRect();


                if (
                    rect.width < 20 ||
                    rect.height < 10
                ) {
                    return;
                }


                if (
                    rect.bottom <
                    SAFE_TOP
                ) {
                    return;
                }


                if (
                    rect.top >
                    window.innerHeight -
                    SAFE_BOTTOM
                ) {
                    return;
                }


                found.push({

                    x:
                        clamp(
                            rect.left +
                            random(
                                20,
                                Math.max(
                                    21,
                                    rect.width - 20
                                )
                            ),
                            10,
                            window.innerWidth -
                            CHAR_WIDTH -
                            10
                        ),

                    y:
                        rect.top - 5,

                    width:
                        rect.width,

                    height:
                        rect.height,

                    type:
                        'surface',

                    element

                });

            }
        );


        return found;
    }


    // =========================================================
    // REBUILD SURFACES
    // =========================================================

    function rebuildSurfaces() {

        surfaces = [

            ...collectLetterSurfaces(),

            ...collectElementSurfaces()

        ];
    }


    // =========================================================
    // FIND NEXT SURFACE
    // =========================================================

    function findNextSurface(
        direction
    ) {

        if (!surfaces.length) {
            return null;
        }


        const candidates =
            surfaces.filter(
                (surface) => {

                    const dx =
                        surface.x -
                        currentX;

                    const dy =
                        surface.y -
                        currentY;


                    const dist =
                        Math.sqrt(
                            dx * dx +
                            dy * dy
                        );


                    if (
                        dist <
                        MIN_DISTANCE
                    ) {
                        return false;
                    }


                    if (
                        dist >
                        MAX_DISTANCE
                    ) {
                        return false;
                    }


                    if (
                        direction > 0 &&
                        surface.y <=
                        currentY + 15
                    ) {
                        return false;
                    }


                    if (
                        direction < 0 &&
                        surface.y >=
                        currentY - 15
                    ) {
                        return false;
                    }


                    return true;
                }
            );


        if (!candidates.length) {
            return null;
        }


        candidates.sort(
            (a, b) => {

                const da =
                    distance(
                        {
                            x: currentX,
                            y: currentY
                        },
                        a
                    );


                const db =
                    distance(
                        {
                            x: currentX,
                            y: currentY
                        },
                        b
                    );


                return da - db;
            }
        );


        const count =
            Math.min(
                6,
                candidates.length
            );


        return candidates[
            Math.floor(
                Math.random() *
                count
            )
        ];
    }


    // =========================================================
    // SET CHARACTER POSITION
    // =========================================================

    function setPosition(
        x,
        y,
        direction = null
    ) {

        currentX = x;
        currentY = y;


        if (direction !== null) {

            character.dataset.direction =
                direction;
        }


        const scale =
            character.dataset.direction === '-1'
                ? -1
                : 1;


        gsap.set(character, {
            x,
            y,
            scaleX: scale
        });
    }


    // =========================================================
    // IDLE ANIMATION
    // =========================================================

    const idleTimeline =
        gsap.timeline({
            paused: true,
            repeat: -1,
            yoyo: true
        });


    idleTimeline.to(
        stickman,
        {
            y: -1.5,
            duration: 0.7,
            ease: 'sine.inOut'
        }
    );


    // =========================================================
    // WALKING ANIMATION
    // =========================================================

    const walkTimeline =
        gsap.timeline({
            paused: true,
            repeat: -1,
            yoyo: true
        });


    walkTimeline.to(
        legLeft,
        {
            rotation: 105,
            duration: 0.18,
            ease: 'sine.inOut'
        },
        0
    );


    walkTimeline.to(
        legRight,
        {
            rotation: 75,
            duration: 0.18,
            ease: 'sine.inOut'
        },
        0
    );


    walkTimeline.to(
        armLeft,
        {
            rotation: 160,
            duration: 0.18,
            ease: 'sine.inOut'
        },
        0
    );


    walkTimeline.to(
        armRight,
        {
            rotation: 20,
            duration: 0.18,
            ease: 'sine.inOut'
        },
        0
    );


    walkTimeline.to(
        body,
        {
            y: 1,
            scaleY: 0.94,
            duration: 0.18,
            ease: 'sine.inOut'
        },
        0
    );


    // =========================================================
    // START WALKING
    // =========================================================

    function startWalking() {

        idleTimeline.pause();

        walkTimeline.restart();
    }


    // =========================================================
    // STOP WALKING
    // =========================================================

    function stopWalking() {

        walkTimeline.pause();


        gsap.to(
            armLeft,
            {
                rotation: 140,
                duration: 0.15,
                ease: 'power2.out'
            }
        );


        gsap.to(
            armRight,
            {
                rotation: 40,
                duration: 0.15,
                ease: 'power2.out'
            }
        );


        gsap.to(
            legLeft,
            {
                rotation: 120,
                duration: 0.15,
                ease: 'power2.out'
            }
        );


        gsap.to(
            legRight,
            {
                rotation: 60,
                duration: 0.15,
                ease: 'power2.out'
            }
        );


        gsap.to(
            body,
            {
                y: 0,
                scaleY: 1,
                rotation: 0,
                duration: 0.15,
                ease: 'power2.out'
            }
        );


        idleTimeline.restart();
    }


    // =========================================================
    // WAVE
    // =========================================================

    function wave() {

        if (moving) {
            return;
        }


        idleTimeline.pause();


        const waveTimeline =
            gsap.timeline();


        waveTimeline.to(
            armRight,
            {
                rotation: -15,
                duration: 0.18,
                ease: 'power2.out'
            }
        );


        waveTimeline.to(
            armRight,
            {
                rotation: 25,
                duration: 0.16,
                repeat: 3,
                yoyo: true,
                ease: 'sine.inOut'
            }
        );


        waveTimeline.to(
            armRight,
            {
                rotation: 40,
                duration: 0.2,
                ease: 'power2.out',
                onComplete: () => {
                    idleTimeline.restart();
                }
            }
        );
    }


    // =========================================================
    // JUMP TO SURFACE
    // =========================================================

    function jumpTo(
        surface,
        callback
    ) {

        if (!surface || moving) {
            return;
        }


        moving = true;


        character.classList.remove(
            'webbing'
        );


        startWalking();


        const startX =
            currentX;

        const startY =
            currentY;


        const endX =
            clamp(
                surface.x -
                CHAR_WIDTH / 2,
                8,
                window.innerWidth -
                CHAR_WIDTH -
                8
            );


        const endY =
            clamp(
                surface.y -
                CHAR_HEIGHT,
                SAFE_TOP,
                window.innerHeight -
                SAFE_BOTTOM
            );


        const dx =
            endX -
            startX;


        const dy =
            endY -
            startY;


        const distanceTotal =
            Math.sqrt(
                dx * dx +
                dy * dy
            );


        const facing =
            dx >= 0
                ? 1
                : -1;


        const duration =
            clamp(
                1.1 +
                distanceTotal *
                0.0012,
                1.1,
                2
            );


        gsap.set(
            character,
            {
                scaleX: facing
            }
        );


        /*
         * Prepare the body.
         */
        gsap.to(
            body,
            {
                y: 3,
                scaleY: 0.94,
                duration: 0.12,
                ease: 'power2.out',
                onComplete: () => {

                    /*
                     * Actual jump.
                     */
                    const jumpTimeline =
                        gsap.timeline({
                            onComplete: () => {

                                currentX =
                                    endX;

                                currentY =
                                    endY;


                                gsap.set(
                                    character,
                                    {
                                        x: endX,
                                        y: endY,
                                        scaleX: facing
                                    }
                                );


                                stopWalking();


                                /*
                                 * Landing bounce.
                                 */
                                gsap.timeline()
                                    .to(
                                        stickman,
                                        {
                                            y: 3,
                                            scaleY: 0.92,
                                            duration: 0.08,
                                            ease: 'power2.in'
                                        }
                                    )
                                    .to(
                                        stickman,
                                        {
                                            y: 0,
                                            scaleY: 1,
                                            duration: 0.22,
                                            ease: 'back.out(2)'
                                        }
                                    );


                                moving = false;

                                currentSurface =
                                    surface;


                                if (callback) {
                                    callback();
                                }
                            }
                        });


                    /*
                     * Main movement.
                     */
                    jumpTimeline.to(
                        character,
                        {
                            x: endX,
                            y: endY,
                            duration,
                            ease: 'power2.inOut'
                        }
                    );


                    /*
                     * Floating body motion.
                     */
                    gsap.to(
                        stickman,
                        {
                            y: -12,
                            rotation:
                                facing === 1
                                    ? 5
                                    : -5,
                            duration:
                                duration / 2,
                            ease: 'sine.out',
                            yoyo: true,
                            repeat: 1
                        }
                    );
                }
            }
        );
    }


    // =========================================================
    // ROAM
    // =========================================================

    function roam() {

        if (
            moving ||
            scrolling
        ) {
            return;
        }


        rebuildSurfaces();


        const direction =
            Math.random() > 0.5
                ? 1
                : -1;


        let target =
            findNextSurface(
                direction
            );


        if (!target) {

            target =
                findNextSurface(
                    -direction
                );
        }


        if (!target) {
            return;
        }


        previousSurface =
            currentSurface;


        jumpTo(
            target,
            () => {

                if (
                    Math.random() <
                    0.35
                ) {

                    wave();
                }


                const delay =
                    random(
                        IDLE_MIN,
                        IDLE_MAX
                    );


                setTimeout(
                    roam,
                    delay
                );
            }
        );
    }


    // =========================================================
    // SCROLL DOWN
    // =========================================================

    function handleScrollDown() {

        if (moving) {
            return;
        }


        scrolling = true;


        rebuildSurfaces();


        const target =
            findNextSurface(1);


        if (target) {

            previousSurface =
                currentSurface;


            jumpTo(
                target,
                () => {

                    scrolling = false;


                    clearTimeout(
                        scrollTimer
                    );


                    scrollTimer =
                        setTimeout(
                            () => {

                                scrolling =
                                    false;

                            },
                            250
                        );
                }
            );

        } else {

            scrolling = false;
        }
    }


    // =========================================================
    // WEB PULL UP
    // =========================================================

    function webPullTo(
        target
    ) {

        if (
            !target ||
            moving
        ) {
            return;
        }


        moving = true;


        idleTimeline.pause();

        walkTimeline.pause();


        character.classList.add(
            'webbing'
        );


        const startX =
            currentX;

        const startY =
            currentY;


        const endX =
            clamp(
                target.x -
                CHAR_WIDTH / 2,
                8,
                window.innerWidth -
                CHAR_WIDTH -
                8
            );


        const endY =
            clamp(
                target.y -
                CHAR_HEIGHT,
                SAFE_TOP,
                window.innerHeight -
                SAFE_BOTTOM
            );


        const dx =
            endX -
            startX;


        const dy =
            endY -
            startY;


        const length =
            Math.sqrt(
                dx * dx +
                dy * dy
            );


        const angle =
            Math.atan2(
                dy,
                dx
            ) *
            180 /
            Math.PI;


        if (web) {

            gsap.set(
                web,
                {
                    height:
                        Math.max(
                            length,
                            80
                        ),
                    rotation:
                        angle + 90,
                    transformOrigin:
                        'top center',
                    left: 20,
                    top: 5,
                    opacity: 0.8
                }
            );
        }


        const duration =
            clamp(
                length * 0.0022,
                0.6,
                1.1
            );


        gsap.to(
            character,
            {
                x: endX,
                y: endY,
                scaleX:
                    dx >= 0
                        ? 1
                        : -1,
                duration,
                ease: 'power4.out',
                onUpdate: () => {

                    const progress =
                        gsap.getProperty(
                            character,
                            'x'
                        );


                    currentX =
                        Number(progress);

                    currentY =
                        Number(
                            gsap.getProperty(
                                character,
                                'y'
                            )
                        );
                },

                onComplete: () => {

                    currentX =
                        endX;

                    currentY =
                        endY;


                    gsap.to(
                        stickman,
                        {
                            rotation: 0,
                            y: 0,
                            duration: 0.2,
                            ease: 'power2.out'
                        }
                    );


                    if (web) {

                        gsap.to(
                            web,
                            {
                                height: 0,
                                opacity: 0,
                                duration: 0.25,
                                ease: 'power2.out'
                            }
                        );
                    }


                    character.classList.remove(
                        'webbing'
                    );


                    moving = false;


                    currentSurface =
                        target;


                    setTimeout(
                        () => {

                            if (
                                !scrolling
                            ) {

                                roam();
                            }

                        },
                        700
                    );
                }
            }
        );


        gsap.to(
            stickman,
            {
                rotation:
                    dx >= 0
                        ? 12
                        : -12,
                duration:
                    duration * 0.5,
                ease: 'sine.inOut',
                yoyo: true,
                repeat: 1
            }
        );
    }


    // =========================================================
    // SCROLL UP
    // =========================================================

    function handleScrollUp() {

        if (moving) {
            return;
        }


        scrolling = true;


        rebuildSurfaces();


        let target =
            previousSurface;


        if (target) {

            if (
                target.y >
                window.innerHeight
            ) {
                target = null;
            }
        }


        if (!target) {

            target =
                findNextSurface(-1);
        }


        if (target) {

            webPullTo(
                target
            );

        } else {

            scrolling = false;
        }
    }


    // =========================================================
    // SCROLL LISTENER
    // =========================================================

    window.addEventListener(
        'scroll',
        () => {

            const currentScroll =
                window.scrollY;


            const delta =
                currentScroll -
                lastScroll;


            lastScroll =
                currentScroll;


            if (
                Math.abs(delta) < 2
            ) {
                return;
            }


            clearTimeout(
                scrollTimer
            );


            if (delta > 0) {

                handleScrollDown();

            } else {

                handleScrollUp();
            }

        },
        {
            passive: true
        }
    );


    // =========================================================
    // RESIZE
    // =========================================================

    window.addEventListener(
        'resize',
        () => {

            rebuildSurfaces();


            currentX =
                clamp(
                    currentX,
                    8,
                    window.innerWidth -
                    CHAR_WIDTH -
                    8
                );


            currentY =
                clamp(
                    currentY,
                    SAFE_TOP,
                    window.innerHeight -
                    SAFE_BOTTOM
                );


            setPosition(
                currentX,
                currentY
            );
        }
    );


    // =========================================================
    // INITIALISE
    // =========================================================

    setTimeout(
        () => {

            rebuildSurfaces();


            if (surfaces.length) {

                const first =
                    surfaces[
                        Math.floor(
                            Math.random() *
                            surfaces.length
                        )
                    ];


                currentX =
                    clamp(
                        first.x -
                        CHAR_WIDTH / 2,
                        8,
                        window.innerWidth -
                        CHAR_WIDTH -
                        8
                    );


                currentY =
                    clamp(
                        first.y -
                        CHAR_HEIGHT,
                        SAFE_TOP,
                        window.innerHeight -
                        SAFE_BOTTOM
                    );


                currentSurface =
                    first;


                setPosition(
                    currentX,
                    currentY
                );


                /*
                 * Let the user see
                 * the character first.
                 */
                idleTimeline.restart();


                setTimeout(
                    () => {

                        roam();

                    },
                    1500
                );
            }

        },
        1200
    );


    // =========================================================
    // REFRESH SURFACES
    // =========================================================

    setInterval(
        () => {

            if (!moving) {
                rebuildSurfaces();
            }

        },
        1500
    );

});