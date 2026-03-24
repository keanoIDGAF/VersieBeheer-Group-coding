<!-- ...................................................... -->
<!-- Name:                       Portfolio List   -->
<!-- Why its made:               This website is made for a school project where we need to make a website that is based on the wireframes and mock-ups we made -->
<!-- Why this file:              This file is made to show the code in this file to be on the screen -->
<!-- ...................................................... -->
<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../style.css"></link>
</head>

<body>
  <div class="container">
    <header>
      <h1>Portfolio List</h1>
    </header>

<nav class="main-nav">
  <a href="../php/index.php" class="btn">Home</a>
  <a href="../php/lijst.php" class="btn">Lijst</a>
</nav>

    <main>
      <article>
        <div class="card">
    <h2>📂 Portfolio Builder</h2>
    
    <label>Who are you?</label>
    <input type="text" id="identity" placeholder="e.g. A digital nomad coder">

    <label>What are your superpowers?</label>
    <input type="text" id="skills" placeholder="e.g. Speed typing and UI design">

    <label>What's on your desk?</label>
    <input type="text" id="tools" placeholder="e.g. Mechanical keyboard and a cat">

    <label>Visual Style</label>
    <select id="style">
        <option value="3D Isometric render">3D Isometric</option>
        <option value="Cinematic photography">Cinematic Photo</option>
        <option value="Minimalist vector art">Minimalist Vector</option>
        <option value="Cyberpunk digital painting">Cyberpunk</option>
    </select>

    <label>Color Palette</label>
    <input type="text" id="colors" placeholder="e.g. Deep blues and gold">

    <button onclick="generatePrompt()">Generate Image Prompt</button>

    <div id="result">
        <strong>Your Prompt:</strong>
        <p id="promptText"></p>
        <p class="copy-hint">Copy this and paste it into our chat!</p>
    </div>
  </div>
    <footer>
      @Group Coding Versie beheer
    </footer>
  </div>
  <script src="../script.js"></script>
</body>
</html>