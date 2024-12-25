<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meilisearch Integration</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css">
</head>
<body>
    <div class="container mx-auto mt-10">
        <h1 class="text-3xl font-bold mb-5">Meilisearch Integration</h1>
        <input type="text" id="search" class="border p-2 w-full" placeholder="Search...">
        <ul id="results" class="mt-5"></ul>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        document.getElementById('search').addEventListener('input', function() {
            const query = this.value;
            if (query.length > 2) {
                axios.get(`/search?q=${query}`)
                    .then(response => {
                        const results = response.data;
                        const resultsContainer = document.getElementById('results');
                        resultsContainer.innerHTML = '';
                        results.forEach(result => {
                            const li = document.createElement('li');
                            li.textContent = result.title;
                            resultsContainer.appendChild(li);
                        });
                    });
            }
        });
    </script>
</body>
</html>
