<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Skill | Ronnie Ozaeta</title>

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
            min-height: 100vh;
            padding: 40px 20px;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
        }

        .card {
            background: #1e293b;
            padding: 35px;
            border-radius: 12px;
            border: 1px solid rgba(56, 189, 248, 0.15);
        }

        h1 {
            color: #38bdf8;
            margin-bottom: 10px;
        }

        .subtitle {
            color: #94a3b8;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 22px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #cbd5e1;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 12px 14px;
            background: #0f172a;
            color: #ffffff;
            border: 1px solid #334155;
            border-radius: 7px;
            font-size: 16px;
            outline: none;
        }

        input:focus {
            border-color: #38bdf8;
        }

        .buttons {
            display: flex;
            gap: 12px;
            margin-top: 30px;
        }

        .btn {
            padding: 12px 22px;
            border-radius: 7px;
            text-decoration: none;
            font-weight: bold;
            cursor: pointer;
            border: none;
            font-size: 15px;
        }

        .update-btn {
            background: #38bdf8;
            color: #0f172a;
        }

        .update-btn:hover {
            background: #7dd3fc;
        }

        .cancel-btn {
            background: transparent;
            color: #38bdf8;
            border: 1px solid #38bdf8;
        }

        .cancel-btn:hover {
            background: #38bdf8;
            color: #0f172a;
        }

        .error {
            background: #7f1d1d;
            color: #fecaca;
            padding: 12px 15px;
            border-radius: 7px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>

<div class="container">

    <div class="card">

        <h1>Edit Skill</h1>

        <p class="subtitle">
            Update the skill information below.
        </p>

        @if ($errors->any())
            <div class="error">
                <ul style="padding-left: 20px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form
            action="{{ route('skills.update', $skill) }}"
            method="POST"
        >

            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Skill Name</label>

                <input
                    type="text"
                    id="name"
                    name="name"
                    value="{{ $skill->name }}"
                    required
                >
            </div>

            <div class="form-group">
                <label for="percentage">Skill Percentage</label>

                <input
                    type="number"
                    id="percentage"
                    name="percentage"
                    value="{{ $skill->percentage }}"
                    min="0"
                    max="100"
                    required
                >
            </div>

            <div class="buttons">

                <button
                    type="submit"
                    class="btn update-btn"
                >
                    Update Skill
                </button>

                <a
                    href="{{ route('skills.index') }}"
                    class="btn cancel-btn"
                >
                    Cancel
                </a>

            </div>

        </form>

    </div>

</div>

</body>
</html>