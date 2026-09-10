<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Add Project | Ronnie Ozaeta</title>

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
        width: 280px;
        height: 280px;
        left: -120px;
        top: 12%;
        border: 1px solid rgba(56, 189, 248, .14);
        box-shadow:
            0 0 80px rgba(56, 189, 248, .07);
    }

    body::after {
        width: 360px;
        height: 360px;
        right: -150px;
        bottom: -120px;
        border: 1px solid rgba(34, 211, 238, .10);
        box-shadow:
            0 0 100px rgba(34, 211, 238, .06);
    }

    /* =========================================================
       CONTAINER
       ========================================================= */

    .container {
        position: relative;
        z-index: 2;

        width: min(700px, 100%);
        margin: auto;
        padding: 38px;

        border: 1px solid rgba(56, 189, 248, .16);
        border-radius: 18px;

        background:
            linear-gradient(
                145deg,
                rgba(15, 23, 42, .90),
                rgba(3, 15, 25, .94)
            );

        box-shadow:
            0 25px 70px rgba(0, 0, 0, .40),
            0 0 35px rgba(56, 189, 248, .04);

        backdrop-filter: blur(12px);
    }

    .container::before {
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
                rgba(56, 189, 248, .75),
                transparent
            );
    }

    /* =========================================================
       HEADER
       ========================================================= */

    .page-accent {
        display: block;
        width: 45px;
        height: 3px;
        margin-bottom: 18px;

        border-radius: 999px;

        background: #38bdf8;

        box-shadow:
            0 0 12px rgba(56, 189, 248, .65);
    }

    h1 {
        margin: 0 0 30px;

        color: #f8fafc;

        font-size: 30px;
        font-weight: 700;
    }

    h1 span {
        color: #38bdf8;
    }

    /* =========================================================
       FORM
       ========================================================= */

    label {
        display: block;

        margin-top: 18px;
        margin-bottom: 7px;

        color: #cbd5e1;

        font-size: 14px;
        font-weight: 600;
    }

    input,
    textarea {
        display: block;

        width: 100%;
        padding: 13px 14px;

        border: 1px solid rgba(148, 163, 184, .18);
        border-radius: 8px;

        outline: none;

        background: rgba(2, 6, 23, .65);
        color: #e2e8f0;

        font-family: inherit;
        font-size: 14px;

        transition:
            border-color .2s ease,
            box-shadow .2s ease,
            background .2s ease;
    }

    input::placeholder,
    textarea::placeholder {
        color: #64748b;
    }

    input:focus,
    textarea:focus {
        border-color: rgba(56, 189, 248, .65);

        background: rgba(2, 10, 20, .85);

        box-shadow:
            0 0 0 3px rgba(56, 189, 248, .08),
            0 0 18px rgba(56, 189, 248, .06);
    }

    textarea {
        min-height: 150px;
        resize: vertical;
    }

    /* =========================================================
       FILE INPUT
       ========================================================= */

    input[type="file"] {
        padding: 10px;
        cursor: pointer;
    }

    input[type="file"]::file-selector-button {
        margin-right: 12px;
        padding: 8px 12px;

        border: 1px solid rgba(56, 189, 248, .25);
        border-radius: 6px;

        background: rgba(56, 189, 248, .08);
        color: #38bdf8;

        cursor: pointer;

        transition: .2s ease;
    }

    input[type="file"]::file-selector-button:hover {
        background: rgba(56, 189, 248, .15);
    }

    /* =========================================================
       BUTTON
       ========================================================= */

    button {
        display: inline-block;

        margin-top: 28px;
        padding: 12px 22px;

        border: 1px solid rgba(56, 189, 248, .35);
        border-radius: 8px;

        background: #0ea5e9;
        color: #ffffff;

        font-size: 14px;
        font-weight: 600;

        cursor: pointer;

        box-shadow:
            0 0 20px rgba(14, 165, 233, .12);

        transition:
            background .2s ease,
            transform .2s ease,
            box-shadow .2s ease;
    }

    button:hover {
        background: #38bdf8;

        transform: translateY(-2px);

        box-shadow:
            0 0 25px rgba(56, 189, 248, .25);
    }

    button:active {
        transform: translateY(0);
    }

    /* =========================================================
       MOBILE
       ========================================================= */

    @media (max-width: 650px) {

        body {
            padding: 30px 15px;
        }

        .container {
            padding: 28px 22px;
            border-radius: 15px;
        }

        h1 {
            font-size: 25px;
        }
    }
</style>
```

</head>

<body>

<div class="container">

```
<span class="page-accent"></span>

<h1>
    Add New Project<span>.</span>
</h1>

<form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">

    @csrf

    <label for="title">Project Title</label>

    <input
        type="text"
        id="title"
        name="title"
        placeholder="My Laravel Project"
        required
    >

    <label for="description">Description</label>

    <textarea
        id="description"
        name="description"
        placeholder="Describe your project..."
        required
    ></textarea>

    <label for="url">Project URL</label>

    <input
        type="url"
        id="url"
        name="url"
        placeholder="https://github.com/..."
    >

    <label for="image">Project Image</label>

    <input
        type="file"
        id="image"
        name="image"
        accept="image/*"
    >

    <button type="submit">
        Save Project
    </button>

</form>

</div>

</body>
</html>
