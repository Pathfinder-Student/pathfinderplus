<h2>Assessment Result</h2>

<p><strong>Recommended SHS Strand:</strong> {{ $strand }}</p>

<p><strong>Your Personality Type:</strong> {{ $personalityType }}</p>

<h4>Strand Breakdown:</h4>
<ul>
    @foreach ($strandTally as $key => $count)
        <li>{{ $key }}: {{ $count }}</li>
    @endforeach
</ul>

<h4>Personality Breakdown:</h4>
<ul>
    <li>Introvert: {{ $personalityTally['A'] ?? 0 }}</li>
    <li>Extrovert: {{ $personalityTally['B'] ?? 0 }}</li>
</ul>
