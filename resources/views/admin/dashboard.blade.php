<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Dashboard | Ronnie Ozaeta</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #0f172a;
            color: #ffffff;
            line-height: 1.6;
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

        nav a {
            color: #cbd5e1;
            text-decoration: none;
            transition: 0.3s;
            font-weight: 500;
        }

        nav a:hover {
            color: #38bdf8;
        }

        /* ================= DASHBOARD ================= */

        .dashboard {
            min-height: 100vh;
            padding: 140px 8% 80px;
            max-width: 1200px;
            margin: auto;
        }

        .dashboard-header {
            margin-bottom: 50px;
        }

        .dashboard-header small {
            color: #38bdf8;
            font-size: 18px;
            font-weight: bold;
        }

        .dashboard-header h1 {
            font-size: clamp(40px, 6vw, 60px);
            margin: 10px 0;
        }

        .dashboard-header p {
            color: #94a3b8;
            font-size: 18px;
        }

        /* ================= CARDS ================= */

        .cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 25px;
            margin-bottom: 40px;
        }

        .card {
            background: #1e293b;
            border-radius: 12px;
            padding: 30px;
            border: 1px solid rgba(255, 255, 255, 0.05);
            transition: 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);
            border-color: rgba(56, 189, 248, 0.4);
        }

        .card-title {
            color: #94a3b8;
            font-size: 16px;
            margin-bottom: 10px;
        }

        .card-number {
            color: #38bdf8;
            font-size: 42px;
            font-weight: bold;
        }

        .status {
            font-size: 28px;
        }

        /* ================= QUICK ACTIONS ================= */

        .section {
            background: #1e293b;
            border-radius: 12px;
            padding: 30px;
            border: 1px solid rgba(255, 255, 255, 0.05);
        }

        .section h2 {
            font-size: 28px;
            margin-bottom: 10px;
        }

        .section p {
            color: #94a3b8;
            margin-bottom: 25px;
        }

        .actions {
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
        .logout-link {
            background: none;
            border: none;
            color: #cbd5e1;
            font-size: 14px;
            cursor: pointer;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        .logout-link:hover {
            color: #38bdf8;
        }
        /* ================= MOBILE ================= */

        @media (max-width: 700px) {

            nav {
                padding: 15px 5%;
            }

            .logo {
                font-size: 20px;
            }

            .dashboard {
                padding: 120px 5% 60px;
            }

            .dashboard-header h1 {
                font-size: 40px;
            }

            .actions {
                flex-direction: column;
            }

            .btn {
                text-align: center;
            }
        }
    </style>
</head>

<body>

    <!-- ================= NAVBAR ================= -->

    <nav>

        <div class="logo">
            Ronnie.
        </div>

        <a href="{{ url('/') }}" target="_blank">
            View Portfolio →
        </a>
        <form method="POST" action="{{ route('logout') }}" style="display:inline;">
            @csrf
            <button type="submit" class="logout-link">Logout</button>
        </form>
    </nav>


    <!-- ================= DASHBOARD ================= -->

    <main class="dashboard">

        <div class="dashboard-header">

            <small>Welcome back</small>

            <h1>Admin Dashboard.</h1>

            <p>
                Manage your portfolio and keep your work up to date.
            </p>

        </div>


        <!-- ================= STAT CARDS ================= -->

        <div class="cards">

            <div class="card">

                <div class="card-title">
                    Total Projects
                </div>

                <div class="card-number">
                    {{ $projectCount }}
                </div>

            </div>


            <div class="card">

                <div class="card-title">
                    About Me
                </div>

                <div class="card-number status">
                    @if(isset($aboutMe) && $aboutMe)
                        Active
                    @else
                        Empty
                    @endif
                </div>

            </div>

            <div class="card">

                <div class="card-title">
                    Total Skills
                </div>

                <div class="card-number">
                    {{ $skillCount }}
                </div>

            </div>


            <div class="card">

                <div class="card-title">
                    Portfolio Status
                </div>

                <div class="card-number status">
                    Active
                </div>

            </div>

        </div>


        <!-- ================= QUICK ACTIONS ================= -->

        <div class="section">

            <h2>Quick Actions</h2>

            <p>
                Manage the content of your portfolio.
            </p>

            <div class="actions">

                <a href="{{ route('projects.index') }}" class="btn">
                    Manage Projects
                </a>

                <a href="{{ route('projects.create') }}" class="btn btn-outline">
                    + Add Project
                </a>

                <a href="{{ route('about.index') }}" class="btn">
                    Manage About Me
                </a>

                <a href="{{ route('skills.index') }}" class="btn">Manage Skills

                </a>

                <a href="{{ url('/') }}" target="_blank" class="btn btn-outline">
                    View Portfolio
                </a>

            </div>

        </div>

    </main>

</body>

</html>

