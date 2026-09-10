<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Ronnie Ozaeta | Laravel Developer</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: Arial, sans-serif;

            background:
                linear-gradient(
                    rgba(56, 189, 248, 0.025) 1px,
                    transparent 1px
                ),
                linear-gradient(
                    90deg,
                    rgba(56, 189, 248, 0.025) 1px,
                    transparent 1px
                ),
                #0f172a;

            background-size: 50px 50px;

            color: #ffffff;

            line-height: 1.6;

            position: relative;

            overflow-x: hidden;
        }


        /* ================= AMBIENT BACKGROUND ================= */

        body::before,
        body::after {
            content: "";

            position: fixed;

            width: 500px;
            height: 500px;

            border-radius: 50%;

            filter: blur(120px);

            opacity: 0.08;

            pointer-events: none;

            z-index: -1;
        }


        body::before {
            background: #38bdf8;

            top: -180px;
            left: -180px;

            animation:
                ambientFloat 14s ease-in-out infinite alternate;
        }


        body::after {
            background: #6366f1;

            right: -180px;
            bottom: -180px;

            animation:
                ambientFloatReverse 17s ease-in-out infinite alternate;
        }


        /* ================= GLOW ANIMATION ================= */

        @keyframes ambientFloat {

            0% {
                transform: translate(0, 0) scale(1);
            }

            50% {
                transform: translate(100px, 70px) scale(1.15);
            }

            100% {
                transform: translate(-30px, 120px) scale(1);
            }

        }


        @keyframes ambientFloatReverse {

            0% {
                transform: translate(0, 0) scale(1);
            }

            50% {
                transform: translate(-100px, -70px) scale(1.15);
            }

            100% {
                transform: translate(30px, -120px) scale(1);
            }

        }

        /* ================= NAVBAR ================= */

        nav {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            padding: 20px 8%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: rgba(15, 23, 42, 0.95);
            backdrop-filter: blur(10px);
            z-index: 1000;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }

        .logo {
            font-size: 24px;
            font-weight: bold;
            color: #38bdf8;
        }

        nav ul {
            display: flex;
            list-style: none;
            gap: 30px;
        }

        nav a {
            color: #cbd5e1;
            text-decoration: none;
            transition: 0.3s;
            font-weight: 500;
        }

        nav a:hover {
            color: #38bdf8;
        }

        /* ================= HERO ================= */

        #home {
            min-height: 100vh;
            display: flex;
            align-items: center;
            padding: 120px 8% 80px;
        }

        .hero {
            max-width: 850px;
        }

        .hero-small {
            color: #38bdf8;
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 15px;
        }

        .hero h1 {
            font-size: clamp(45px, 7vw, 75px);
            line-height: 1.1;
            margin-bottom: 20px;
        }

        .hero h1 span {
            color: #38bdf8;
        }

        .hero h2 {
            font-size: 30px;
            color: #94a3b8;
            margin-bottom: 20px;
        }

        .hero p {
            color: #cbd5e1;
            font-size: 18px;
            max-width: 700px;
            margin-bottom: 35px;
        }

        .hero-buttons {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
        }

        .btn {
            display: inline-block;
            padding: 13px 26px;
            background: #38bdf8;
            color: #0f172a;
            text-decoration: none;
            font-weight: bold;
            border-radius: 7px;
            transition: 0.3s;
        }

        .btn:hover {
            background: #7dd3fc;
            transform: translateY(-3px);
        }

        .btn-outline {
            background: transparent;
            color: #38bdf8;
            border: 1px solid #38bdf8;
        }

        .btn-outline:hover {
            background: #38bdf8;
            color: #0f172a;
        }

        /* ================= GENERAL SECTIONS ================= */

        section {
            padding: 100px 8%;
        }

        .section-title {
            text-align: center;
            margin-bottom: 50px;
        }

        .section-title h2 {
            font-size: 42px;
            margin-bottom: 10px;
        }

        .section-title p {
            color: #94a3b8;
        }

        /* ================= ABOUT ================= */

        .about-card {
            max-width: 1100px;
            margin: 0 auto;

            display: grid;
            grid-template-columns: 0.9fr 1.1fr;
            gap: 55px;

            padding: 45px;

            background: rgba(15, 23, 42, 0.65);

            border: 1px solid rgba(56, 189, 248, 0.15);

            border-radius: 20px;

            box-shadow:
                0 20px 60px rgba(0, 0, 0, 0.2);

            backdrop-filter: blur(10px);

            position: relative;
            overflow: hidden;
        }

        .about-card::before {
            content: "";

            position: absolute;

            width: 250px;
            height: 250px;

            background: #38bdf8;

            filter: blur(120px);

            opacity: 0.07;

            top: -120px;
            left: -120px;

            pointer-events: none;
        }


        /* CODE WINDOW */

        .about-code {
            background: #020617;

            border: 1px solid rgba(56, 189, 248, 0.15);

            border-radius: 14px;

            overflow: hidden;

            align-self: center;

            box-shadow:
                0 15px 40px rgba(0, 0, 0, 0.3);
        }

        .code-top {
            height: 38px;

            display: flex;
            align-items: center;

            gap: 7px;

            padding: 0 15px;

            background: #0f172a;

            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }

        .code-top span {
            width: 9px;
            height: 9px;

            border-radius: 50%;

            background: #475569;
        }

        .code-content {
            padding: 28px 25px;

            font-family: Consolas, monospace;

            font-size: 14px;

            line-height: 1.8;

            color: #cbd5e1;
        }

        .indent {
            margin-left: 20px;
        }

        .code-purple {
            color: #c084fc;
        }

        .code-blue {
            color: #38bdf8;
        }

        .code-orange {
            color: #fb923c;
        }

        .code-green {
            color: #4ade80;
        }


        /* ABOUT TEXT */

        .about-text h3 {
            font-size: 30px;

            line-height: 1.3;

            margin-bottom: 18px;
        }

        .about-text h3 span {
            color: #38bdf8;
        }

        .about-text > p {
            color: #94a3b8;

            line-height: 1.8;

            margin-bottom: 28px;
        }


        /* DETAILS */

        .about-details {
            display: grid;

            grid-template-columns: 1fr 1fr;

            gap: 12px;

            margin-bottom: 30px;
        }

        .about-detail {
            display: flex;

            align-items: center;

            gap: 13px;

            padding: 14px;

            background: rgba(30, 41, 59, 0.55);

            border: 1px solid rgba(56, 189, 248, 0.1);

            border-radius: 10px;

            transition: 0.3s ease;
        }

        .about-detail:hover {
            transform: translateY(-3px);

            border-color: rgba(56, 189, 248, 0.4);

            background: rgba(30, 41, 59, 0.8);
        }

        .detail-icon {
            width: 36px;
            height: 36px;

            display: flex;

            align-items: center;
            justify-content: center;

            border-radius: 8px;

            background: rgba(56, 189, 248, 0.1);

            color: #38bdf8;

            font-size: 18px;

            flex-shrink: 0;
        }

        .about-detail strong {
            display: block;

            font-size: 13px;

            color: #ffffff;
        }

        .about-detail p {
            margin: 2px 0 0;

            font-size: 12px;

            color: #64748b;
        }

        /* ================= SKILLS TERMINAL ================= */

        .terminal-window {
            max-width: 900px;
            margin: 0 auto;

            background: #020617;

            border: 1px solid rgba(56, 189, 248, 0.2);

            border-radius: 14px;

            overflow: hidden;

            box-shadow:
                0 25px 60px rgba(0, 0, 0, 0.35),
                0 0 40px rgba(56, 189, 248, 0.05);
        }


        /* TERMINAL HEADER */

        .terminal-header {
            height: 45px;

            display: flex;
            align-items: center;

            position: relative;

            padding: 0 18px;

            background: #0f172a;

            border-bottom: 1px solid rgba(255, 255, 255, 0.06);
        }

        .terminal-dots {
            display: flex;
            gap: 7px;
        }

        .terminal-dots span {
            width: 10px;
            height: 10px;

            border-radius: 50%;

            background: #475569;
        }

        .terminal-title {
            position: absolute;

            left: 50%;

            transform: translateX(-50%);

            color: #64748b;

            font-family: Consolas, monospace;

            font-size: 12px;
        }


        /* TERMINAL BODY */

        .terminal-body {
            padding: 30px;

            font-family: Consolas, "Courier New", monospace;

            font-size: 14px;

            line-height: 1.8;

            color: #cbd5e1;
        }


        /* COMMAND */

        .terminal-line {
            margin-bottom: 25px;
        }

        .terminal-user {
            color: #4ade80;
        }

        .terminal-symbol {
            color: #94a3b8;
        }

        .terminal-path {
            color: #38bdf8;

            margin-right: 10px;
        }

        .terminal-command {
            color: #ffffff;
        }


        /* OUTPUT */

        .terminal-output {
            padding-left: 5px;
        }

        .terminal-category {
            color: #c084fc;

            margin-bottom: 18px;
        }


        /* SKILLS */

        .terminal-skill {
            display: flex;

            align-items: center;

            gap: 15px;

            margin-bottom: 10px;

            white-space: nowrap;
        }

        .skill-name {
            width: 130px;

            color: #38bdf8;
        }

        .skill-bar {
            letter-spacing: 1px;

            font-size: 13px;
        }

        .bar-filled {
            color: #38bdf8;
        }

        .bar-empty {
            color: #334155;
        }

        .skill-percentage {
            color: #94a3b8;

            font-size: 12px;
        }


        /* PROMPT */

        .terminal-prompt {
            margin-top: 25px;
        }

        .cursor {
            display: inline-block;

            width: 8px;
            height: 16px;

            margin-left: 5px;

            vertical-align: middle;

            background: #38bdf8;

            animation: terminalCursor 1s steps(2) infinite;
        }

        @keyframes terminalCursor {

            0% {
                opacity: 1;
            }

            50% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }

        }


        /* MOBILE */

        @media (max-width: 650px) {

            .terminal-body {
                padding: 22px 18px;

                font-size: 12px;

                overflow-x: auto;
            }

            .terminal-title {
                font-size: 10px;
            }

            .terminal-skill {
                gap: 8px;
            }

            .skill-name {
                width: 90px;
            }

            .skill-bar {
                font-size: 10px;

                letter-spacing: 0;
            }

            .skill-percentage {
                font-size: 10px;
            }

        }
        /* ================= PROJECT SLIDER ================= */

        .projects-slider {
            max-width: 1200px;
            margin: 0 auto;

            display: flex;
            align-items: center;
            gap: 15px;

            position: relative;
        }

        .projects-track {
            display: flex;
            gap: 22px;

            width: 100%;

            overflow: hidden;

            scroll-behavior: smooth;

            scrollbar-width: none;
        }

        .projects-track::-webkit-scrollbar {
            display: none;
        }


        /* PROJECT CARD */

        .project {
            flex: 0 0 calc((100% - 44px) / 3);

            background: rgba(30, 41, 59, 0.9);

            border: 1px solid rgba(56, 189, 248, 0.12);

            border-radius: 16px;

            overflow: hidden;

            transition: 0.35s ease;
        }

        .project:hover {
            transform: translateY(-7px);

            border-color: rgba(56, 189, 248, 0.4);

            box-shadow:
                0 20px 45px rgba(0, 0, 0, 0.25);
        }


        /* PROJECT IMAGE */

        .project-image-wrapper {
            width: 100%;
            height: 170px;

            overflow: hidden;
        }

        .project-image {
            width: 100%;
            height: 100%;

            display: block;

            object-fit: cover;

            transition: transform 0.5s ease;
        }

        .project:hover .project-image {
            transform: scale(1.05);
        }


        /* NO IMAGE */

        .project-image-placeholder {
            width: 100%;
            height: 170px;

            display: flex;
            align-items: center;
            justify-content: center;

            background:
                linear-gradient(
                    135deg,
                    rgba(56, 189, 248, 0.08),
                    rgba(99, 102, 241, 0.08)
                );
        }

        .project-image-placeholder span {
            font-family: Consolas, monospace;

            font-size: 50px;

            color: rgba(56, 189, 248, 0.3);
        }


        /* CONTENT */

        .project-content {
            padding: 20px;
        }

        .project-content h3 {
            margin: 0 0 10px;

            font-size: 18px;

            color: #ffffff;
        }

        .project-content p {
            margin: 0 0 17px;

            color: #94a3b8;

            font-size: 13px;

            line-height: 1.7;
        }


        /* TECHNOLOGY TAGS */

        .project-tags {
            display: flex;

            flex-wrap: wrap;

            gap: 7px;

            margin-bottom: 20px;
        }

        .project-tags span {
            padding: 5px 9px;

            border-radius: 20px;

            font-size: 10px;

            color: #38bdf8;

            background: rgba(56, 189, 248, 0.08);

            border: 1px solid rgba(56, 189, 248, 0.15);
        }


        /* PROJECT LINK */

        .project-link {
            display: inline-flex;

            align-items: center;

            gap: 7px;

            color: #38bdf8;

            font-size: 13px;

            font-weight: bold;

            text-decoration: none;

            transition: 0.3s ease;
        }

        .project-link span {
            transition: 0.3s ease;
        }

        .project-link:hover {
            color: #7dd3fc;
        }

        .project-link:hover span {
            transform: translateX(5px);
        }


        /* SLIDER BUTTONS */

        .slider-btn {
            flex-shrink: 0;

            width: 45px;
            height: 45px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 50%;

            border: 1px solid rgba(56, 189, 248, 0.25);

            background: rgba(15, 23, 42, 0.85);

            color: #38bdf8;

            font-size: 30px;

            line-height: 1;

            cursor: pointer;

            transition: 0.3s ease;
        }

        .slider-btn:hover {
            background: #38bdf8;

            color: #0f172a;

            border-color: #38bdf8;

            box-shadow:
                0 0 20px rgba(56, 189, 248, 0.3);
        }


        /* DOTS */

        .slider-dots {
            display: flex;

            justify-content: center;

            gap: 7px;

            margin-top: 25px;
        }

        .slider-dot {
            width: 7px;
            height: 7px;

            border-radius: 50%;

            background: #475569;

            transition: 0.3s ease;
        }

        .slider-dot.active {
            width: 22px;

            border-radius: 10px;

            background: #38bdf8;
        }


        /* TABLET */

        @media (max-width: 1000px) {

            .project {
                flex: 0 0 calc((100% - 22px) / 2);
            }

        }


        /* MOBILE */

        @media (max-width: 650px) {

            .projects-slider {
                gap: 8px;
            }

            .project {
                flex: 0 0 100%;
            }

            .slider-btn {
                width: 38px;
                height: 38px;

                font-size: 25px;
            }

        }

        /* =========================================================
                CONTACT SECTION
            ========================================================= */

            #contact {
                position: relative;
                padding-bottom: 120px;
            }


            /* Small heading above title */
            .contact-kicker {
                display: inline-block;
                margin-bottom: 10px;

                font-size: 0.72rem;
                font-weight: 700;
                letter-spacing: 3px;

                color: #38bdf8;
                opacity: 0.85;
            }


            /* Contact glass card */
            .contact-card {
                position: relative;

                max-width: 950px;
                margin: 45px auto 0;

                padding: 45px;

                background:
                    linear-gradient(
                        145deg,
                        rgba(15, 23, 42, 0.88),
                        rgba(3, 15, 25, 0.94)
                    );

                border: 1px solid rgba(56, 189, 248, 0.15);

                border-radius: 20px;

                box-shadow:
                    0 25px 70px rgba(0, 0, 0, 0.35),
                    0 0 35px rgba(56, 189, 248, 0.04);

                backdrop-filter: blur(12px);

                overflow: hidden;
            }


            /* Subtle cyan glow inside the card */
            .contact-card::before {
                content: "";

                position: absolute;

                width: 260px;
                height: 260px;

                top: -150px;
                right: -100px;

                border-radius: 50%;

                border: 1px solid rgba(56, 189, 248, 0.12);

                box-shadow:
                    0 0 80px rgba(56, 189, 248, 0.08);

                pointer-events: none;
            }


            /* Main layout */
            .contact-content {
                position: relative;
                z-index: 1;

                display: flex;
                align-items: center;
                justify-content: space-between;

                gap: 60px;
            }


            /* Left side */
            .contact-message {
                max-width: 560px;
            }


            .contact-icon {
                display: inline-flex;

                align-items: center;
                justify-content: center;

                width: 38px;
                height: 38px;

                margin-bottom: 18px;

                border: 1px solid rgba(56, 189, 248, 0.25);
                border-radius: 10px;

                color: #38bdf8;

                background: rgba(56, 189, 248, 0.06);

                box-shadow:
                    0 0 20px rgba(56, 189, 248, 0.06);
            }


            .contact-message h3 {
                margin: 0 0 15px;

                font-size: clamp(1.7rem, 3vw, 2.35rem);

                line-height: 1.15;

                color: #f8fafc;
            }


            .contact-message p {
                margin: 0;

                max-width: 520px;

                font-size: 0.98rem;
                line-height: 1.8;

                color: #94a3b8;
            }


            /* Email display */
            .contact-email {
                display: inline-flex;

                align-items: center;
                gap: 10px;

                margin-top: 25px;
                padding: 10px 14px;

                border-radius: 9px;

                background: rgba(56, 189, 248, 0.045);

                border: 1px solid rgba(56, 189, 248, 0.12);

                color: #cbd5e1;

                font-size: 0.88rem;
            }


            .email-symbol {
                color: #38bdf8;

                font-size: 1rem;
            }


            /* Right side */
            .contact-actions {
                min-width: 220px;

                display: flex;
                flex-direction: column;
                align-items: center;
            }


            /* Main email button */
            .contact-button {
                display: flex;

                align-items: center;
                justify-content: space-between;

                width: 100%;
                min-width: 220px;

                padding: 14px 18px;

                text-decoration: none;

                border-radius: 10px;

                color: #021018;

                background: #38bdf8;

                font-size: 0.9rem;
                font-weight: 700;

                transition:
                    transform 0.25s ease,
                    box-shadow 0.25s ease,
                    background 0.25s ease;
            }


            .contact-button:hover {
                transform: translateY(-3px);

                background: #67d3ff;

                box-shadow:
                    0 10px 30px rgba(56, 189, 248, 0.25);
            }


            .contact-arrow {
                font-size: 1.2rem;

                transition:
                    transform 0.25s ease;
            }


            .contact-button:hover .contact-arrow {
                transform: translateX(5px);
            }


            /* Social section */
            .contact-socials {
                margin-top: 28px;

                width: 100%;

                text-align: center;
            }


            .social-label {
                display: block;

                margin-bottom: 12px;

                font-size: 0.65rem;
                font-weight: 700;

                letter-spacing: 2px;

                color: #64748b;
            }


            /* Social icons */
            .contact-socials .social-links {
                display: flex;

                justify-content: center;

                gap: 10px;
            }


            .contact-socials .social-link {
                display: flex;

                align-items: center;
                justify-content: center;

                width: 42px;
                height: 42px;

                border-radius: 10px;

                border: 1px solid rgba(148, 163, 184, 0.13);

                background: rgba(15, 23, 42, 0.55);

                transition:
                    transform 0.25s ease,
                    border-color 0.25s ease,
                    background 0.25s ease,
                    box-shadow 0.25s ease;
            }


            .contact-socials .social-link svg {
                width: 18px;
                height: 18px;

                fill: #94a3b8;

                transition:
                    fill 0.25s ease,
                    transform 0.25s ease;
            }


            .contact-socials .social-link:hover {
                transform: translateY(-3px);

                border-color: rgba(56, 189, 248, 0.35);

                background: rgba(56, 189, 248, 0.07);

                box-shadow:
                    0 8px 25px rgba(56, 189, 248, 0.08);
            }


            .contact-socials .social-link:hover svg {
                fill: #38bdf8;

                transform: scale(1.08);
            }


            /* Availability status */
            .contact-status {
                position: relative;
                z-index: 1;

                display: flex;

                align-items: center;
                justify-content: center;

                gap: 9px;

                margin-top: 32px;

                font-size: 0.75rem;

                color: #64748b;

                text-align: center;
            }


            .status-dot {
                width: 7px;
                height: 7px;

                border-radius: 50%;

                background: #22c55e;

                box-shadow:
                    0 0 10px rgba(34, 197, 94, 0.55);
            }


            /* =========================================================
            MOBILE
            ========================================================= */

            @media (max-width: 760px) {

                #contact {
                    padding-bottom: 80px;
                }

                .contact-card {
                    margin-top: 35px;

                    padding: 30px 22px;

                    border-radius: 16px;
                }

                .contact-content {
                    flex-direction: column;

                    align-items: stretch;

                    gap: 35px;
                }

                .contact-message {
                    max-width: none;
                }

                .contact-message h3 {
                    font-size: 1.7rem;
                }

                .contact-message p {
                    font-size: 0.92rem;
                }

                .contact-email {
                    width: 100%;

                    box-sizing: border-box;

                    justify-content: center;

                    font-size: 0.78rem;
                }

                .contact-actions {
                    width: 100%;

                    min-width: 0;
                }

                .contact-button {
                    width: 100%;

                    min-width: 0;

                    box-sizing: border-box;
                }

                .contact-socials {
                    margin-top: 25px;
                }

            }

        /* ================= FOOTER ================= */

        footer {
            text-align: center;
            padding: 25px;
            color: #64748b;
            background: #0f172a;
        }

        /* ================= SCROLL REVEAL ================= */

        .reveal {
            opacity: 0;
            transform: translateY(40px);
            transition: opacity 0.8s ease, transform 0.8s ease;
        }

        .reveal.active {
            opacity: 1;
            transform: translateY(0);
        }

        /* =========================================================
   TINY ROAMING STICKMAN
   ========================================================= */

.roaming-stickman {
    position: fixed;

    left: 0;
    top: 0;

    width: 45px;
    height: 50px;

    pointer-events: none;

    z-index: 100;

    opacity: 0;

    will-change: transform;

    transition: opacity .4s ease;
}

.roaming-stickman.visible {
    opacity: 1;
}


/* =========================================================
   CHARACTER
   ========================================================= */

.mini-stickman {
    position: absolute;

    width: 40px;
    height: 48px;

    left: 0;
    top: 0;

    /*
     * GSAP controls the transform.
     */
    transform-origin: center bottom;

    will-change: transform;
}


/* =========================================================
   HEAD
   ========================================================= */

.mini-head {
    position: absolute;

    width: 8px;
    height: 8px;

    left: 16px;
    top: 0;

    border: 1.3px solid #e2e8f0;

    border-radius: 50%;

    box-shadow:
        0 0 5px rgba(56, 189, 248, .25);

    will-change: transform;
}


/* =========================================================
   BODY
   ========================================================= */

.mini-body {
    position: absolute;

    width: 1.5px;
    height: 17px;

    left: 20px;
    top: 8px;

    background: #e2e8f0;

    transform-origin: top center;

    will-change: transform;
}


/* =========================================================
   ARMS
   ========================================================= */

.mini-arm {
    position: absolute;

    width: 13px;
    height: 1.5px;

    left: 20px;
    top: 14px;

    background: #e2e8f0;

    transform-origin: left center;

    will-change: transform;
}


/*
 * IMPORTANT:
 * These are the RESTING positions.
 *
 * GSAP takes over when the stickman moves.
 */

.mini-arm-left {
    transform: rotate(140deg);
}

.mini-arm-right {
    transform: rotate(40deg);
}


/* =========================================================
   LEGS
   ========================================================= */

.mini-leg {
    position: absolute;

    width: 15px;
    height: 1.5px;

    left: 20px;
    top: 25px;

    background: #e2e8f0;

    transform-origin: left center;

    will-change: transform;
}


/*
 * RESTING positions
 */

.mini-leg-left {
    transform: rotate(120deg);
}

.mini-leg-right {
    transform: rotate(60deg);
}


/* =========================================================
   NO CSS WALK ANIMATION
   =========================================================

   Walking is now controlled completely by GSAP.

   DO NOT add:

   .walking
   @keyframes miniArmLeft
   @keyframes miniArmRight
   @keyframes miniLegLeft
   @keyframes miniLegRight

   here.
*/


/* =========================================================
   NO CSS JUMP ANIMATION
   =========================================================

   Jumping is now controlled completely by GSAP.

   DO NOT add:

   .jump .mini-stickman
   @keyframes miniJump

   here.
*/


/* =========================================================
   DIVE
   ========================================================= */

.roaming-stickman.dive .mini-stickman {
    transition:
        transform .3s cubic-bezier(.2, .8, .2, 1);
}


/*
 * Don't force a rotation here.
 *
 * GSAP controls the body transform.
 */


/* =========================================================
   WEB
   ========================================================= */

.mini-web {
    position: absolute;

    width: 1px;
    height: 0;

    left: 20px;
    top: 5px;

    background:
        linear-gradient(
            to bottom,
            rgba(255, 255, 255, .9),
            #38bdf8,
            transparent
        );

    opacity: 0;

    transform-origin: top center;

    /*
     * GSAP/JS controls the web movement.
     */
    will-change: height, transform, opacity;

    transition:
        height .25s ease,
        opacity .2s ease;
}


/*
 * Web is visible while pulling upward.
 */

.roaming-stickman.webbing .mini-web {
    height: 100px;
    opacity: .8;
}


/* =========================================================
   MOBILE / TABLET
   ========================================================= */

@media (max-width: 900px) {

    .roaming-stickman {
        transform-origin: right center;
    }

}


/* =========================================================
   MOBILE
   ========================================================= */

@media (max-width: 650px) {

    .roaming-stickman {
        display: none;
    }

}
        /* ================= MOBILE ================= */

        @media (max-width: 700px) {

            nav {
                padding: 15px 5%;
            }

            nav ul {
                gap: 12px;
                font-size: 13px;
            }

            .logo {
                font-size: 18px;
            }

            #home {
                padding: 120px 5% 80px;
            }

            section {
                padding: 80px 5%;
            }

            .hero h2 {
                font-size: 23px;
            }

            .hero p {
                font-size: 16px;
            }

            .section-title h2 {
                font-size: 34px;
            }

            .skills-container {
                grid-template-columns: 1fr;
            }

            .about-card {
                grid-template-columns: 1fr;
                padding: 25px;
                gap: 30px;
            }

            .about-details {
                grid-template-columns: 1fr;
            }

            .code-content {
                font-size: 12px;
            }
        }
    </style>

  @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body>

    <!-- ================= ROAMING STICKMAN ================= -->

        <div class="roaming-stickman" aria-hidden="true">

            <div class="mini-stickman">

                <div class="mini-head"></div>

                <div class="mini-body"></div>

                <div class="mini-arm mini-arm-left"></div>
                <div class="mini-arm mini-arm-right"></div>

                <div class="mini-leg mini-leg-left"></div>
                <div class="mini-leg mini-leg-right"></div>

            </div>

            <div class="mini-web"></div>

        </div>

<!-- ================= NAVBAR ================= -->

<nav>

    <div class="logo">
        Ronnie.
    </div>

    <ul>
        <li><a href="#home">Home</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="#skills">Skills</a></li>
        <li><a href="#projects">Projects</a></li>
        <li><a href="#contact">Contact</a></li>
    </ul>

</nav>


<!-- ================= HERO ================= -->

<section id="home">

    <div class="hero">

        <div class="hero-small">
            Hello, I'm
        </div>

        <h1>
            Ronnie <span>Ozaeta.</span>
        </h1>

        <h2>
            Laravel Developer
        </h2>

        <p>
            I build modern, responsive and practical web applications
            using Laravel, PHP, MySQL, HTML, CSS and JavaScript.
            I enjoy turning ideas into functional digital experiences.
        </p>

        <div class="hero-buttons">

            <a href="#projects" class="btn">
                View My Projects
            </a>

            <a href="#contact" class="btn btn-outline">
                Contact Me
            </a>

        </div>

    </div>

</section>


<!-- ================= ABOUT ================= -->

<section id="about" class="reveal">

    <div class="section-title">
        <h2>About Me</h2>
        <p>Who I am and what I do</p>
    </div>

    <div class="about-card">

        <div class="about-code">
            <div class="code-top">
                <span></span>
                <span></span>
                <span></span>
            </div>

            <div class="code-content">
                <span class="code-purple">const</span>
                <span class="code-blue"> developer</span> =
                <span class="code-orange"> {</span>

                <br><br>

                <span class="indent">
                    name:
                    <span class="code-green">'Ronnie Ozaeta'</span>,
                </span>

                <br>

                <span class="indent">
                    role:
                    <span class="code-green">'Laravel Developer'</span>,
                </span>

                <br>

                <span class="indent">
                    passion:
                    <span class="code-green">'Building Web Apps'</span>
                </span>

                <br>

                <span class="code-orange">};</span>
            </div>
        </div>


        <div class="about-text">

            <h3>Turning Ideas Into <span>Digital Solutions.</span></h3>

            <p>
                {{ $aboutMe->content ?? 'I am a Computer Science graduate and aspiring Laravel developer who enjoys building practical, responsive and user-friendly web applications.' }}
            </p>

            <div class="about-details">

                <div class="about-detail">
                    <div class="detail-icon">⌘</div>
                    <div>
                        <strong>Development</strong>
                        <p>Laravel & PHP</p>
                    </div>
                </div>

                <div class="about-detail">
                    <div class="detail-icon">◈</div>
                    <div>
                        <strong>Database</strong>
                        <p>MySQL</p>
                    </div>
                </div>

                <div class="about-detail">
                    <div class="detail-icon">◇</div>
                    <div>
                        <strong>Frontend</strong>
                        <p>HTML, CSS & JS</p>
                    </div>
                </div>

                <div class="about-detail">
                    <div class="detail-icon">✓</div>
                    <div>
                        <strong>Approach</strong>
                        <p>Practical & User-Focused</p>
                    </div>
                </div>

            </div>

            <a href="{{ asset('files/Ronnie_Ozaeta_CV.pdf') }}"
                class="btn"
                download>
                    Download CV
                </a>

        </div>

    </div>

</section>

<!-- ================= SKILLS ================= -->

<section id="skills" class="reveal">

    <div class="section-title">

        <h2>My Skills</h2>

        <p>
            Tools and technologies I work with
        </p>

    </div>


    <div class="terminal-window">

        <!-- Terminal Header -->

        <div class="terminal-header">

            <div class="terminal-dots">
                <span></span>
                <span></span>
                <span></span>
            </div>

            <div class="terminal-title">
                ronnie@developer:~
            </div>

        </div>


        <!-- Terminal Content -->

        <div class="terminal-body">

            <div class="terminal-line">

                <span class="terminal-user">
                    ronnie@developer
                </span>

                <span class="terminal-symbol">:</span>

                <span class="terminal-path">~$</span>

                <span class="terminal-command">
                    skills
                </span>

            </div>


            <div class="terminal-output">

                <div class="terminal-category">
                    &gt; skills
                </div>


                @forelse($skills as $skill)

                    <div class="terminal-skill">

                        <span class="skill-name">
                            {{ $skill->name }}
                        </span>

                        <span class="skill-bar">

                            @php
                                $filled = round($skill->percentage / 10);
                                $empty = 10 - $filled;
                            @endphp

                            <span class="bar-filled">
                                {{ str_repeat('█', $filled) }}
                            </span>

                            <span class="bar-empty">
                                {{ str_repeat('░', $empty) }}
                            </span>

                        </span>

                        <span class="skill-percentage">
                            {{ $skill->percentage }}%
                        </span>

                    </div>

                @empty

                    <div class="terminal-category">
                        &gt; No skills available yet.
                    </div>

                @endforelse


                <div class="terminal-prompt">

                    <span class="terminal-user">
                        ronnie@developer
                    </span>

                    <span class="terminal-symbol">:</span>

                    <span class="terminal-path">~$</span>

                    <span class="cursor"></span>

                </div>

            </div>

        </div>

    </div>

</section>

<!-- ================= PROJECTS ================= -->

<section id="projects" class="reveal">

    <div class="section-title">

        <h2>My Projects</h2>

        <p>
            Some things I've built
        </p>

    </div>


    <div class="projects-slider">

        <button class="slider-btn slider-prev" type="button">
            ‹
        </button>


        <div class="projects-track">

            @forelse($projects as $project)

                <div class="project">

                    @if($project->image)

                        <div class="project-image-wrapper">

                            <img
                                src="{{ asset('storage/' . $project->image) }}"
                                alt="{{ $project->title }}"
                                class="project-image"
                            >

                        </div>

                    @else

                        <div class="project-image-placeholder">
                            <span>&lt;/&gt;</span>
                        </div>

                    @endif


                    <div class="project-content">

                        <h3>
                            {{ $project->title }}
                        </h3>

                        <p>
                            {{ $project->description }}
                        </p>


                        <div class="project-tags">

                            <span>Laravel</span>
                            <span>PHP</span>
                            <span>MySQL</span>

                        </div>


                        @if($project->url)

                            <a
                                href="{{ $project->url }}"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="project-link"
                            >
                                View Project
                                <span>→</span>
                            </a>

                        @endif

                    </div>

                </div>

            @empty

                <div class="no-projects">

                    <p>
                        No projects available yet.
                    </p>

                </div>

            @endforelse

        </div>


        <button class="slider-btn slider-next" type="button">
            ›
        </button>

    </div>


    <div class="slider-dots"></div>

</section>


<!-- ================= CONTACT ================= -->

<!-- CONTACT -->
<section id="contact" class="reveal">

    <div class="section-title">
        <span class="contact-kicker">GET IN TOUCH</span>
        <h2>Let's Connect</h2>
        <p>
            Have a project in mind, an opportunity, or simply want to say hello?
        </p>
    </div>

    <div class="contact-card">

        <div class="contact-content">

            <div class="contact-message">
                <span class="contact-icon">✦</span>

                <h3>Let's build something together.</h3>

                <p>
                    I'm always open to discussing projects, opportunities,
                    collaborations, or ideas that can turn into something useful.
                </p>

                <div class="contact-email">
                    <span class="email-symbol">✉</span>
                    <span>ozaetaronnie8@gmail.com</span>
                </div>
            </div>


            <div class="contact-actions">

                <!-- Primary Email Button -->
                <a href="https://mail.google.com/mail/?view=cm&fs=1&to=ozaetaronnie8@gmail.com"
                   target="_blank"
                   rel="noopener noreferrer"
                   class="contact-button">

                    <span>Send me an email</span>
                    <span class="contact-arrow">→</span>

                </a>


                <!-- Social Links -->
                <div class="contact-socials">

                    <span class="social-label">OR FIND ME ON</span>

                    <div class="social-links">

                        <!-- Facebook -->
                        <a href="https://www.facebook.com/ronnie.ozaeta.5"
                           target="_blank"
                           rel="noopener noreferrer"
                           class="social-link"
                           aria-label="Facebook">

                            <svg viewBox="0 0 24 24" aria-hidden="true">
                                <path d="M14 8h3V4h-3c-3.31 0-5 1.69-5 5v3H6v4h3v8h4v-8h3l1-4h-4V9c0-.66.34-1 1-1z"/>
                            </svg>

                        </a>


                        <!-- GitHub -->
                        <a href="https://github.com/gutomnako"
                           target="_blank"
                           rel="noopener noreferrer"
                           class="social-link"
                           aria-label="GitHub">

                            <svg viewBox="0 0 24 24" aria-hidden="true">
                                <path d="M12 .5a12 12 0 0 0-3.79 23.39c.6.11.82-.26.82-.58v-2.05c-3.34.73-4.04-1.61-4.04-1.61-.55-1.39-1.34-1.76-1.34-1.76-1.09-.75.08-.74.08-.74 1.2.08 1.84 1.24 1.84 1.24 1.07 1.84 2.81 1.31 3.5 1 .11-.78.42-1.31.76-1.61-2.67-.3-5.47-1.33-5.47-5.93 0-1.31.47-2.38 1.24-3.22-.12-.3-.54-1.52.12-3.17 0 0 1.01-.32 3.3 1.23a11.5 11.5 0 0 1 6 0c2.29-1.55 3.3-1.23 3.3-1.23.66 1.65.24 2.87.12 3.17.77.84 1.24 1.91 1.24 3.22 0 4.61-2.81 5.62-5.48 5.92.43.37.81 1.1.81 2.22v3.29c0 .32.22.69.83.57A12 12 0 0 0 12 .5z"/>
                            </svg>

                        </a>


                        <!-- Gmail -->
                        <a href="https://mail.google.com/mail/?view=cm&fs=1&to=ozaetaronnie8@gmail.com"
                           target="_blank"
                           rel="noopener noreferrer"
                           class="social-link"
                           aria-label="Email">

                            <svg viewBox="0 0 24 24" aria-hidden="true">
                                <path d="M20 4H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2zm0 4-8 5-8-5V6l8 5 8-5v2z"/>
                            </svg>

                        </a>

                    </div>

                </div>

            </div>

        </div>

        <div class="contact-status">
            <span class="status-dot"></span>
            Currently open to opportunities and collaborations
        </div>

    </div>

</section>

<!-- ================= FOOTER ================= -->

<footer>

    <p>
        © {{ date('Y') }} Ronnie Ozaeta. All rights reserved.
    </p>

</footer>

</body>

</html>