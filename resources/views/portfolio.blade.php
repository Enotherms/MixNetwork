<!doctype html>
<html class="scroll-smooth duration-500">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio | MixNetwork</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    @vite('resources/css/app.css')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body class="bg-WhiteCol font-din">
    @include('navbar')

    <section>
        <div class="flex justify-center p-[2em]">
            <h1 class="font-thin text-[1.2em] md:text-[1.5em] lg:[2em] xl:text-[3em] 2xl:text-[4em]">
                A FEW OF OUR <span class="font-bold text-BlueCol">SUCCESS STORIES</span>
            </h1>
        </div>
    </section>

    <!-- Filter Form -->
    <section class="mb-6">
        <div class="flex justify-center">
            <form id="filterForm" class="flex flex-col md:flex-row gap-4 items-center">
                <div>
                    <label for="search" class="block text-gray-700 text-sm font-bold mb-2">Search:</label>
                    <input type="text" name="search" id="search" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div>
                    <label for="tags" class="block text-gray-700 text-sm font-bold mb-2">Tags:</label>
                    <select name="tags[]" id="tags" multiple class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        @foreach($tags as $tag)
                            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                        @endforeach
                    </select>
                </div>
            </form>
        </div>
    </section>

    <section>
        <div id="portfolioList" class="flex justify-center items-center mb-[1em] mx-[1em] gap-[1em] md:mx-[2em] md:gap-[1.5em] lg:mx-[5em]">
            @include('portfolio.list', ['portfolios' => $portfolios])
        </div>
        <div class="flex justify-center">
            {{ $portfolios->links() }}
        </div>
    </section>

    @include('footer')

    <script>
        $(document).ready(function() {
            $('#search, #tags').on('change', function() {
                fetchPortfolios();
            });
        });

        function fetchPortfolios() {
            $.ajax({
                url: '{{ route("portfolio.filter") }}',
                type: 'GET',
                data: $('#filterForm').serialize(),
                success: function(data) {
                    $('#portfolioList').html(data);
                }
            });
        }
    </script>
</body>
</html>
