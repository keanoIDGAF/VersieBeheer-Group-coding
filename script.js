function generatePrompt() {
        const identity = document.getElementById('identity').value || "A professional";
        const skills = document.getElementById('skills').value || "creative work";
        const tools = document.getElementById('tools').value || "essential tools";
        const style = document.getElementById('style').value;
        const colors = document.getElementById('colors').value || "natural colors";

        const prompt = `A professional portfolio visual for ${identity}. The scene highlights ${skills} featuring ${tools} on a desk. Style: ${style}. Lighting/Colors: ${colors}. High resolution, 8k, clean composition.`;

        document.getElementById('promptText').innerText = prompt;
        document.getElementById('result').style.display = 'block';
    }