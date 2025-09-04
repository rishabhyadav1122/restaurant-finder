<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Classy Restaurant Finder</title>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap');
      /* Fade-in effect */
  body {
    opacity: 0;
    transition: opacity 0.8s ease-in-out;
  }
  body.loaded {
    opacity: 1;
  }

  /* Spinner overlay */
  .loader-overlay {
    position: fixed;
    top: 0; left: 0;
    width: 100%; height: 100%;
    background: rgba(10, 15, 26, 0.95);
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 9999;
    transition: opacity 0.6s ease, visibility 0.6s ease;
  }

  .loader {
    width: 60px;
    height: 60px;
    border: 6px solid rgba(255, 255, 255, 0.1);
    border-top: 6px solid #00c6ff;
    border-radius: 50%;
    animation: spin 1s linear infinite;
    box-shadow: 0 0 15px rgba(0,198,255,0.6);
  }

  @keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
  }

  .hidden {
    opacity: 0;
    visibility: hidden;
  }
    :root {
      --dark-background: #0a0f1a;
      --card-background: rgba(30, 30, 50, 0.9);
      --text-light: #e0e0e0;
      --accent-gradient: linear-gradient(135deg, #00c6ff, #0072ff, #6a11cb);
    }

    body {
      font-family: 'Poppins', sans-serif;
      margin: 0;
      padding: 0;
      background: radial-gradient(circle at top, #101828, #0a0f1a);
      color: var(--text-light);
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
    }

    .container {
      background: var(--card-background);
      padding: 50px 40px;
      border-radius: 20px;
      box-shadow: 0 20px 40px rgba(0, 0, 0, 0.7);
      width: 90%;
      max-width: 500px;
      border: 1px solid rgba(255, 255, 255, 0.08);
      backdrop-filter: blur(15px);
    }

    h1 {
      font-weight: 700;
      font-size: 2.7em;
      margin-bottom: 25px;
      background: var(--accent-gradient);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      letter-spacing: 1px;
    }

    label {
      display: block;
      margin-bottom: 12px;
      font-size: 1.1em;
      opacity: 0.85;
    }

    input[type="text"] {
      width: 100%;
      padding: 14px;
      margin-bottom: 25px;
      border: 1px solid rgba(255, 255, 255, 0.2);
      border-radius: 10px;
      background-color: rgba(20, 20, 40, 0.8);
      color: var(--text-light);
      font-size: 1em;
      transition: all 0.3s ease;
    }

    input[type="text"]:focus {
      outline: none;
      border-color: #00c6ff;
      box-shadow: 0 0 10px rgba(0, 198, 255, 0.5);
    }

    button {
      padding: 14px 30px;
      border: none;
      border-radius: 10px;
      background: var(--accent-gradient);
      color: white;
      font-size: 1.1em;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.3s ease;
      box-shadow: 0 6px 18px rgba(0, 198, 255, 0.3);
    }

    button:hover {
      transform: translateY(-4px) scale(1.02);
      box-shadow: 0 12px 25px rgba(0, 198, 255, 0.5);
    }
  </style>
</head>
<body>
    <div class="loader-overlay">
  <div class="loader"></div>
</div>

  <div class="container">
    <h1>Find Restaurants</h1>
    <form action="/search" method="POST">
      @csrf
      <label for="city">Enter a City:</label>
      <input type="text" id="city" name="city" placeholder="e.g., New York" required>
      <button type="submit">Search</button>
    </form>
  </div>

<script>
  // Page load effect
  document.addEventListener("DOMContentLoaded", () => {
    document.body.classList.add("loaded");

    // Hide spinner once content is ready
    const loader = document.querySelector(".loader-overlay");
    setTimeout(() => {
      loader.classList.add("hidden");
    }, 800);
  });

  // Optional: Smooth fade-out before navigating
  document.addEventListener("click", function(e) {
    const link = e.target.closest("a, button[type='submit']");
    if (link && link.getAttribute("href")) {
      e.preventDefault();
      document.body.style.opacity = "0";
      setTimeout(() => {
        window.location.href = link.href;
      }, 600);
    }
  });
</script>  
</body>
</html>
