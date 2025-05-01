<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Perayaan Pita Meledak</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    body {
        margin: 0;
        overflow: hidden;
        background-color: #fff8f0;
        height: 100vh;
    }

    .celebrate-text {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: 10;
        text-align: center;
        color: #d63384;
        font-size: 3rem;
        font-weight: bold;
        animation: pop 1s ease-out;
    }

    @keyframes pop {
        0% {
            transform: scale(0.5) translate(-50%, -50%);
            opacity: 0;
        }

        100% {
            transform: scale(1) translate(-50%, -50%);
            opacity: 1;
        }
    }

    .ribbon {
        position: absolute;
        width: 10px;
        height: 30px;
        background-color: red;
        opacity: 0.9;
        z-index: 5;
        border-radius: 3px;
        animation: explode 3s linear forwards;
    }

    @keyframes explode {
        0% {
            transform: translate(0, 0) rotate(0deg);
            opacity: 1;
        }

        100% {
            transform: translate(var(--x), var(--y)) rotate(720deg);
            opacity: 0;
        }
    }
    </style>
</head>

<body>

    <div class="celebrate-text">
        🎉 Selamat Ulang Tahun! 🎂
    </div>

    <script>
    function createRibbon() {
        const ribbon = document.createElement("div");
        ribbon.classList.add("ribbon");

        const colors = ["#e74c3c", "#f1c40f", "#2ecc71", "#3498db", "#9b59b6", "#fd79a8"];
        ribbon.style.backgroundColor = colors[Math.floor(Math.random() * colors.length)];

        // Posisi acak dari sisi
        const sides = ["top", "bottom", "left", "right"];
        const side = sides[Math.floor(Math.random() * sides.length)];

        const size = Math.random() * 20 + 10;
        ribbon.style.width = `${size / 2}px`;
        ribbon.style.height = `${size}px`;

        let x = 0,
            y = 0;

        if (side === "top") {
            ribbon.style.top = "0";
            ribbon.style.left = `${Math.random() * 100}vw`;
            y = `${100 + Math.random() * 100}vh`;
            x = `${(Math.random() - 0.5) * 200}vw`;
        } else if (side === "bottom") {
            ribbon.style.bottom = "0";
            ribbon.style.left = `${Math.random() * 100}vw`;
            y = `-${100 + Math.random() * 100}vh`;
            x = `${(Math.random() - 0.5) * 200}vw`;
        } else if (side === "left") {
            ribbon.style.left = "0";
            ribbon.style.top = `${Math.random() * 100}vh`;
            x = `${100 + Math.random() * 100}vw`;
            y = `${(Math.random() - 0.5) * 200}vh`;
        } else {
            ribbon.style.right = "0";
            ribbon.style.top = `${Math.random() * 100}vh`;
            x = `-${100 + Math.random() * 100}vw`;
            y = `${(Math.random() - 0.5) * 200}vh`;
        }

        ribbon.style.setProperty('--x', x);
        ribbon.style.setProperty('--y', y);

        document.body.appendChild(ribbon);

        setTimeout(() => {
            ribbon.remove();
        }, 3000);
    }

    const ribbonInterval = setInterval(createRibbon, 100);

    setTimeout(() => {
        clearInterval(ribbonInterval);
    }, 10000); // Stop after 10 seconds
    </script>

</body>

</html>