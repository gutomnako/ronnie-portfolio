<x-app-layout>

<style>
    /* =========================================================
       DASHBOARD PAGE
       ========================================================= */

    .dashboard-page {
        position: relative;
        min-height: calc(100vh - 70px);
        overflow: hidden;
        background:
            radial-gradient(
                circle at 15% 20%,
                rgba(56, 189, 248, 0.10),
                transparent 25%
            ),
            radial-gradient(
                circle at 85% 75%,
                rgba(6, 182, 212, 0.08),
                transparent 28%
            ),
            linear-gradient(
                135deg,
                #020617 0%,
                #061521 50%,
                #03111c 100%
            );
        color: #e2e8f0;
    }

    /* Background glowing circles */

    .dashboard-orb {
        position: absolute;
        border-radius: 50%;
        pointer-events: none;
        filter: blur(1px);
        opacity: .5;
    }

    .dashboard-orb.one {
        width: 260px;
        height: 260px;
        top: 8%;
        left: -80px;
        border: 1px solid rgba(56, 189, 248, .15);
        box-shadow:
            0 0 80px rgba(56, 189, 248, .08);
    }

    .dashboard-orb.two {
        width: 180px;
        height: 180px;
        right: 8%;
        top: 12%;
        border: 1px solid rgba(34, 211, 238, .12);
        box-shadow:
            0 0 70px rgba(34, 211, 238, .06);
    }

    .dashboard-orb.three {
        width: 320px;
        height: 320px;
        right: -120px;
        bottom: -100px;
        border: 1px solid rgba(56, 189, 248, .10);
        box-shadow:
            0 0 100px rgba(56, 189, 248, .06);
    }

    /* Small glowing dots */

    .dashboard-dot {
        position: absolute;
        width: 5px;
        height: 5px;
        border-radius: 50%;
        background: #38bdf8;
        box-shadow:
            0 0 12px rgba(56, 189, 248, .8);
        opacity: .55;
        pointer-events: none;
    }

    .dashboard-dot.one {
        top: 25%;
        left: 18%;
    }

    .dashboard-dot.two {
        top: 65%;
        right: 22%;
    }

    .dashboard-dot.three {
        bottom: 18%;
        left: 35%;
    }

    /* Content */

    .dashboard-content {
        position: relative;
        z-index: 2;
        padding: 80px 20px;
    }

    .dashboard-container {
        width: min(900px, 100%);
        margin: 0 auto;
    }

    .dashboard-card {
        position: relative;
        overflow: hidden;
        padding: 40px;
        border: 1px solid rgba(56, 189, 248, .16);
        border-radius: 18px;
        background:
            linear-gradient(
                145deg,
                rgba(15, 23, 42, .88),
                rgba(3, 15, 25, .92)
            );
        box-shadow:
            0 20px 60px rgba(0, 0, 0, .35),
            0 0 35px rgba(56, 189, 248, .04);
        backdrop-filter: blur(12px);
    }

    .dashboard-card::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 1px;
        background:
            linear-gradient(
                90deg,
                transparent,
                rgba(56, 189, 248, .7),
                transparent
            );
    }

    .dashboard-title {
        margin-bottom: 10px;
        color: #f8fafc;
        font-size: 28px;
        font-weight: 700;
    }

    .dashboard-title span {
        color: #38bdf8;
    }

    .dashboard-message {
        color: #94a3b8;
        font-size: 16px;
        line-height: 1.7;
    }

    .dashboard-accent {
        display: inline-block;
        width: 45px;
        height: 3px;
        margin-bottom: 25px;
        border-radius: 999px;
        background: #38bdf8;
        box-shadow:
            0 0 12px rgba(56, 189, 248, .6);
    }

    @media (max-width: 640px) {

        .dashboard-content {
            padding: 50px 18px;
        }

        .dashboard-card {
            padding: 28px 22px;
        }

        .dashboard-title {
            font-size: 23px;
        }
    }
</style>


<div class="dashboard-page">

    <!-- Background elements -->
    <div class="dashboard-orb one"></div>
    <div class="dashboard-orb two"></div>
    <div class="dashboard-orb three"></div>

    <div class="dashboard-dot one"></div>
    <div class="dashboard-dot two"></div>
    <div class="dashboard-dot three"></div>


    <!-- Dashboard content -->
    <div class="dashboard-content">

        <div class="dashboard-container">

            <div class="dashboard-card">

                <span class="dashboard-accent"></span>

                <h2 class="dashboard-title">
                    Welcome<span>.</span>
                </h2>

                <div class="dashboard-message">
                    {{ __("You're logged in!") }}
                </div>

            </div>

        </div>

    </div>

</div>
</x-app-layout>
