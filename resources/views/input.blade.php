<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
</head>
<body>
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('input') }}" method="POST">
        @csrf

        <select name="year" id="year">
            <option value="">---</option>
            @foreach ($years as $year)
                <option value="{{ $year }}" {{ old('year') == $year ? 'selected' : '' }}>
                    {{ $year }}
                </option>
            @endforeach
        </select>
        <label for="year">年</label>

        <select name="month" id="month">
            <option value="">---</option>
            @foreach ($months as $month)
                <option value="{{ $month }}" {{ old('month') == $month ? 'selected' : '' }}>
                    {{ $month }}
                </option>
            @endforeach
        </select>
        <label for="month">月</label>

        <select name="day" id="day" data-old-value="{{ old('day') }}">
        </select>
        <label for="day">日</label>

        <button type="submit">送信</button>
    </form>

    <script src="/js/birthday.js"></script>
</body>
</html>
