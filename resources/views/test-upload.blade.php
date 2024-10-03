<!DOCTYPE html>
<html>
<head>
    <title>Test Upload</title>
</head>
<body>
    <h1>Upload a File</h1>
    <form action="/upload" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="file">Choose a file:</label>
        <input type="file" id="file" name="file" required>
        <br><br>
        <label for="name">Enter a name for the file:</label>
        <input type="text" id="name" name="name" required>
        <br><br>
        <button type="submit">Upload</button>
    </form>
</body>
</html>