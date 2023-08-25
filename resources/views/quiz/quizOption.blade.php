<!-- Add a form to take user input -->
<form action="/quiz/display" method="get">
    <label for="category">Category:</label>
    <select name="category" id="category">
        <option value="Code">Code</option>
        <option value="SQL">SQL</option>
        <option value="Docker">Docker</option>
    </select><br>

    <label for="limit">nb question:</label>
    <input type="number" name="limit" id="limit" min="5" max="10" value="5"><br>

    <label for="difficulty">Difficulty:</label>
    <select name="difficulty" id="difficulty">
        <option value="Easy">Easy</option>
        <option value="Medium">Medium</option>
        <option value="Hard">Hard</option>
    </select><br>
    <button type="submit">Get Quizz</button>
</form>


