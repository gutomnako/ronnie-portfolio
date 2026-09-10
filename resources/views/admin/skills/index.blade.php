<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Manage Skills | Ronnie Ozaeta</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #0f172a;
            color: #e2e8f0;
            margin: 0;
            padding: 40px;
        }

        .container {
            max-width: 1000px;
            margin: auto;
        }

        h1 {
            color: #38bdf8;
            margin-bottom: 10px;
        }

        .subtitle {
            color: #94a3b8;
            margin-bottom: 30px;
        }

        .card {
            background: #1e293b;
            padding: 25px;
            border-radius: 12px;
            margin-bottom: 25px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #334155;
            border-radius: 6px;
            background: #0f172a;
            color: white;
        }

        input:focus {
            outline: none;
            border-color: #38bdf8;
        }

        button {
            background: #38bdf8;
            color: #0f172a;
            border: none;
            padding: 12px 20px;
            border-radius: 6px;
            font-weight: bold;
            cursor: pointer;
        }

        button:hover {
            opacity: 0.9;
        }

        .skill {
            margin-bottom: 25px;
        }

        .skill-header {
    display: flex;
    justify-content: space-between;
    margin-bottom: 8px;
        }

        .skill-actions {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .edit-btn,
        .delete-btn {
            padding: 7px 12px;
            border-radius: 6px;
            font-size: 13px;
            font-weight: bold;
            text-decoration: none;
            cursor: pointer;
        }

        .edit-btn {
            color: #38bdf8;
            border: 1px solid #38bdf8;
            background: transparent;
        }

        .edit-btn:hover {
            background: #38bdf8;
            color: #0f172a;
        }

        .delete-btn {
            color: #f87171;
            border: 1px solid #f87171;
            background: transparent;
        }

        .delete-btn:hover {
            background: #f87171;
            color: #0f172a;
        }

        .skill-name {
            font-weight: bold;
        }

        .percentage {
            color: #38bdf8;
        }

        .progress {
            width: 100%;
            height: 10px;
            background: #334155;
            border-radius: 10px;
            overflow: hidden;
        }

        .progress-bar {
            height: 100%;
            background: #38bdf8;
            border-radius: 10px;
        }

        .success {
            background: #14532d;
            color: #bbf7d0;
            padding: 12px;
            border-radius: 6px;
            margin-bottom: 20px;
        }

        .error {
            background: #7f1d1d;
            color: #fecaca;
            padding: 12px;
            border-radius: 6px;
            margin-bottom: 20px;
        }

        .back {
            display: inline-block;
            margin-bottom: 25px;
            color: #38bdf8;
            text-decoration: none;
        }

        .back:hover {
            text-decoration: underline;
        }

        @media (max-width: 600px) {
            body {
                padding: 20px;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <a href="{{ route('admin.dashboard') }}" class="back">
        ← Back to Dashboard
    </a>

    <h1>Manage Skills</h1>

    <p class="subtitle">
        Add and manage the skills displayed on your portfolio.
    </p>

    @if(session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="error">
            @foreach($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <div class="card">

        <h2>Add Skill</h2>

        <form action="{{ route('skills.store') }}" method="POST">

            @csrf

            <label for="name">Skill Name</label>

            <input
                type="text"
                id="name"
                name="name"
                placeholder="e.g. HTML"
                value="{{ old('name') }}"
                required
            >

            <label for="percentage">Skill Percentage</label>

            <input
                type="number"
                id="percentage"
                name="percentage"
                min="0"
                max="100"
                placeholder="e.g. 90"
                value="{{ old('percentage') }}"
                required
            >

            <button type="submit">
                + Add Skill
            </button>

        </form>

    </div>

    <div class="card">

        <h2>Your Skills</h2>

        @forelse($skills as $skill)

            <div class="skill">

                <div class="skill-header">

                    <div>
                        <span class="skill-name">
                            {{ $skill->name }}
                        </span>

                        <span class="percentage">
                            {{ $skill->percentage }}%
                        </span>
                    </div>

                    <div class="skill-actions">

                        <a
                            href="{{ route('skills.edit', $skill) }}"
                            class="edit-btn"
                        >
                            Edit
                        </a>

                        <form
                            action="{{ route('skills.destroy', $skill) }}"
                            method="POST"
                            style="display: inline;"
                            onsubmit="return confirm('Are you sure you want to delete this skill?');"
                        >
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="delete-btn">
                                Delete
                            </button>
                        </form>

                    </div>

                </div>

                <div class="progress">

                    <div
                        class="progress-bar"
                        style="width: {{ $skill->percentage }}%;"
                    ></div>

                </div>

            </div>

        @empty

            <p style="color: #94a3b8;">
                No skills added yet.
            </p>

        @endforelse

    </div>

</div>

</body>
</html>