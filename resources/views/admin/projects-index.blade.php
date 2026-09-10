<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Manage Projects | Ronnie Ozaeta</title>

<style>
    * {
        box-sizing: border-box;
    }

    html,
    body {
        margin: 0;
        min-height: 100%;
    }

    body {
        font-family: Arial, sans-serif;
        min-height: 100vh;
        padding: 60px 20px;

        color: #e2e8f0;

        overflow-x: hidden;

        background:
            radial-gradient(
                circle at 15% 20%,
                rgba(56, 189, 248, .10),
                transparent 25%
            ),
            radial-gradient(
                circle at 85% 75%,
                rgba(6, 182, 212, .08),
                transparent 28%
            ),
            linear-gradient(
                135deg,
                #020617 0%,
                #061521 50%,
                #03111c 100%
            );
    }

    /* =========================================================
       BACKGROUND ORBS
       ========================================================= */

    body::before,
    body::after {
        content: "";
        position: fixed;

        border-radius: 50%;

        pointer-events: none;
        z-index: 0;
    }

    body::before {
        width: 300px;
        height: 300px;

        left: -130px;
        top: 10%;

        border: 1px solid rgba(56, 189, 248, .14);

        box-shadow:
            0 0 90px rgba(56, 189, 248, .07);
    }

    body::after {
        width: 380px;
        height: 380px;

        right: -160px;
        bottom: -140px;

        border: 1px solid rgba(34, 211, 238, .10);

        box-shadow:
            0 0 110px rgba(34, 211, 238, .06);
    }

    /* =========================================================
       MAIN CONTAINER
       ========================================================= */

    .container {
        position: relative;
        z-index: 2;

        width: min(900px, 100%);
        margin: auto;
    }

    /* =========================================================
       HEADER
       ========================================================= */

    .header {
        display: flex;
        justify-content: space-between;
        align-items: center;

        gap: 20px;

        margin-bottom: 30px;
    }

    .title-area {
        position: relative;
    }

    .page-accent {
        display: block;

        width: 45px;
        height: 3px;

        margin-bottom: 15px;

        border-radius: 999px;

        background: #38bdf8;

        box-shadow:
            0 0 12px rgba(56, 189, 248, .65);
    }

    .header h1 {
        margin: 0;

        color: #f8fafc;

        font-size: 30px;
        font-weight: 700;
    }

    .header h1 span {
        color: #38bdf8;
    }

    /* =========================================================
       ADD PROJECT BUTTON
       ========================================================= */

    .header a {
        display: inline-flex;
        align-items: center;
        justify-content: center;

        padding: 12px 18px;

        border: 1px solid rgba(56, 189, 248, .30);
        border-radius: 8px;

        background: rgba(14, 165, 233, .12);

        color: #38bdf8;

        font-size: 14px;
        font-weight: 600;

        text-decoration: none;

        transition:
            background .2s ease,
            color .2s ease,
            transform .2s ease,
            box-shadow .2s ease;
    }

    .header a:hover {
        background: #0ea5e9;
        color: #ffffff;

        transform: translateY(-2px);

        box-shadow:
            0 0 25px rgba(56, 189, 248, .20);
    }

    /* =========================================================
       PROJECT CARD
       ========================================================= */

    .project {
        position: relative;

        margin-bottom: 18px;
        padding: 25px;

        border: 1px solid rgba(56, 189, 248, .13);
        border-radius: 14px;

        background:
            linear-gradient(
                145deg,
                rgba(15, 23, 42, .88),
                rgba(3, 15, 25, .93)
            );

        box-shadow:
            0 15px 40px rgba(0, 0, 0, .25);

        backdrop-filter: blur(10px);

        overflow: hidden;

        transition:
            transform .25s ease,
            border-color .25s ease,
            box-shadow .25s ease;
    }

    .project::before {
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
                rgba(56, 189, 248, .55),
                transparent
            );
    }

    .project:hover {
        transform: translateY(-3px);

        border-color: rgba(56, 189, 248, .30);

        box-shadow:
            0 20px 50px rgba(0, 0, 0, .35),
            0 0 25px rgba(56, 189, 248, .05);
    }

    /* =========================================================
       PROJECT TITLE
       ========================================================= */

    .project h3 {
        margin: 0 0 10px;

        color: #f8fafc;

        font-size: 20px;
    }

    .project p {
        margin: 0 0 20px;

        color: #94a3b8;

        font-size: 14px;
        line-height: 1.7;
    }

    /* =========================================================
       ACTIONS
       ========================================================= */

    .actions {
        display: flex;
        align-items: center;
        flex-wrap: wrap;

        gap: 10px;
    }

    .actions a,
    .actions button {
        display: inline-flex;
        align-items: center;
        justify-content: center;

        padding: 8px 13px;

        border-radius: 7px;

        font-family: inherit;
        font-size: 13px;
        font-weight: 600;

        text-decoration: none;

        cursor: pointer;

        transition:
            background .2s ease,
            color .2s ease,
            border-color .2s ease,
            transform .2s ease;
    }

    /* View */

    .view-link {
        border: 1px solid rgba(56, 189, 248, .22);

        background: rgba(56, 189, 248, .07);

        color: #38bdf8;
    }

    .view-link:hover {
        background: rgba(56, 189, 248, .16);

        transform: translateY(-1px);
    }

    /* Edit */

    .edit-link {
        border: 1px solid rgba(148, 163, 184, .20);

        background: rgba(148, 163, 184, .06);

        color: #cbd5e1;
    }

    .edit-link:hover {
        background: rgba(148, 163, 184, .13);

        color: #ffffff;

        transform: translateY(-1px);
    }

    /* Delete */

    .delete-button {
        border: 1px solid rgba(248, 113, 113, .22);

        background: rgba(248, 113, 113, .06);

        color: #f87171;
    }

    .delete-button:hover {
        background: rgba(248, 113, 113, .14);

        color: #fca5a5;

        transform: translateY(-1px);
    }

    /* =========================================================
       EMPTY STATE
       ========================================================= */

    .empty-projects {
        position: relative;

        padding: 45px 25px;

        border: 1px solid rgba(56, 189, 248, .13);
        border-radius: 14px;

        background:
            linear-gradient(
                145deg,
                rgba(15, 23, 42, .88),
                rgba(3, 15, 25, .93)
            );

        text-align: center;

        box-shadow:
            0 15px 40px rgba(0, 0, 0, .25);
    }

    .empty-projects p {
        margin: 0;

        color: #64748b;

        font-size: 15px;
    }

    /* =========================================================
       MOBILE
       ========================================================= */

    @media (max-width: 650px) {

        body {
            padding: 35px 15px;
        }

        .header {
            flex-direction: column;
            align-items: flex-start;
        }

        .header a {
            width: 100%;
        }

        .header h1 {
            font-size: 26px;
        }

        .project {
            padding: 22px;
        }

        .actions {
            align-items: stretch;
        }

        .actions a,
        .actions button {
            flex: 1;
        }
    }
</style>
</head>

<body>

<div class="container">

<!-- HEADER -->

<div class="header">

    <div class="title-area">

        <span class="page-accent"></span>

        <h1>
            My Projects<span>.</span>
        </h1>

    </div>

    <a href="{{ route('projects.create') }}">
        + Add Project
    </a>

</div>


<!-- PROJECTS -->

@forelse($projects as $project)

    <div class="project">

        <h3>
            {{ $project->title }}
        </h3>

        <p>
            {{ $project->description }}
        </p>


        <div class="actions">

            @if($project->url)

                <a
                    href="{{ $project->url }}"
                    target="_blank"
                    class="view-link"
                >
                    View Project →
                </a>

            @endif


            <a
                href="{{ route('projects.edit', $project->id) }}"
                class="edit-link"
            >
                Edit
            </a>


            <form
                action="{{ route('projects.destroy', $project->id) }}"
                method="POST"
                style="display:inline;"
            >

                @csrf
                @method('DELETE')

                <button
                    type="submit"
                    class="delete-button"
                    onclick="return confirm('Are you sure you want to delete this project?')"
                >
                    Delete
                </button>

            </form>

        </div>

    </div>

@empty

    <div class="empty-projects">

        <p>
            No projects have been added yet.
        </p>

    </div>

@endforelse

</div>

</body>

</html>
