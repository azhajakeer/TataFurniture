<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Progress Bar Example</title>

    <!-- Tailwind CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    
    <script>
        // This function will update the progress bar width dynamically
        function updateProgressBar(progress) {
            const progressBar = document.getElementById('progress-bar');
            progressBar.style.width = progress + '%';
        }

        // Example: Call updateProgressBar every second with incremental progress
        let progress = 0;
        setInterval(() => {
            if (progress < 100) {
                progress += 5; // Increment by 5%
                updateProgressBar(progress);
            }
        }, 1000); // Update every second
    </script>
</head>
<body class="bg-gray-100 py-8">

    <div class="container mx-auto">
        <h1 class="text-3xl font-bold text-center text-green-600 mb-8">Styled Progress Bar</h1>

        <!-- Progress Bar Container -->
        <div class="w-full bg-gray-200 rounded-full h-4 mb-4">
            <!-- Styled Progress Bar -->
            <div 
                id="progress-bar"
                class="bg-green-500 h-4 rounded-full transition-all duration-500"
                style="width: 0%;"  <!-- Initial width is 0% -->
            >
            </div>
        </div>

        <!-- Display Progress Percentage -->
        <p class="text-center text-gray-700 font-medium mt-4">
            Progress: <span id="progress-text">0%</span>
        </p>
    </div>

</body>
</html>
