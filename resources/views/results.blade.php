<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Search Results</title>
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
      --text-faded: #a0a0a0;
      --accent-gradient: linear-gradient(135deg, #00c6ff, #0072ff, #6a11cb);
      --highlight: #00c6ff;
    }

    body {
      font-family: 'Poppins', sans-serif;
      margin: 0;
      padding: 50px 20px;
      background: radial-gradient(circle at top, #101828, #0a0f1a);
      color: var(--text-light);
    }

    .header {
      text-align: center;
      margin-bottom: 40px;
    }

    h1 {
      font-weight: 700;
      font-size: 2.8em;
      background: var(--accent-gradient);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      letter-spacing: 1px;
    }

    .results-list {
      list-style: none;
      padding: 0;
      max-width: 800px;
      margin: 0 auto;
    }

    .restaurant-card {
      background: var(--card-background);
      padding: 25px;
      margin-bottom: 20px;
      border-radius: 15px;
      box-shadow: 0 12px 25px rgba(0, 0, 0, 0.6);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      border: 1px solid rgba(255, 255, 255, 0.08);
      backdrop-filter: blur(10px);
    }

    .restaurant-card:hover {
      transform: translateY(-6px) scale(1.01);
      box-shadow: 0 15px 35px rgba(0, 198, 255, 0.4);
    }

    strong {
      display: block;
      font-size: 1.6em;
      margin-bottom: 8px;
      font-weight: 600;
      color: #fff;
    }

    .address {
      color: var(--text-faded);
      font-weight: 300;
      margin-bottom: 12px;
    }

    .rating {
      font-weight: 600;
      color: var(--highlight);
    }

    .no-results {
      text-align: center;
      font-size: 1.2em;
      color: var(--text-faded);
    }

    .back-link {
      display: inline-block;
      margin-top: 30px;
      padding: 14px 30px;
      border-radius: 10px;
      background: var(--accent-gradient);
      color: white;
      text-decoration: none;
      font-weight: 600;
      transition: all 0.3s ease;
      box-shadow: 0 6px 18px rgba(0, 198, 255, 0.3);
    }

    .back-link:hover {
      transform: translateY(-4px);
      box-shadow: 0 12px 25px rgba(0, 198, 255, 0.5);
    }
  </style>
</head>
<body>
    <div class="loader-overlay">
  <div class="loader"></div>
</div>

  <div class="header">
    <h1>Restaurants in {{ $city }}</h1>
  </div>

  @if (!empty($restaurants))
    <ul class="results-list">
      @foreach ($restaurants as $restaurant)
        <li class="restaurant-card">
          <strong>{{ $restaurant['name'] }}</strong>
          <span class="address">📍 {{ $restaurant['address'] }}</span><br>
          <span class="rating">⭐ Rating: {{ $restaurant['rating'] ?? 'N/A' }}</span>
        </li>
      @endforeach
    </ul>
  @else
    <p class="no-results">No restaurants found.</p>
  @endif

  <div style="text-align: center; margin-top: 40px;">
    <a href="/" class="back-link">🔍 Search Again</a>
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
