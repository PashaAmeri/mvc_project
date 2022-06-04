
    <main class="bg-gray-50 py-10">

        <div class="flex gap-8 flex-wrap flex-grow flex-shrink mx-20 justify-around" id="doctors">

            <?php

            foreach ($main_doctors as $doctor) {
            ?>

                <div class="bg-white font-semibold text-center rounded-3xl border shadow-lg p-10 w-80">
                    <img class="mb-3 w-32 h-32 rounded-full shadow-lg mx-auto" src="https://images.unsplash.com/photo-1633332755192-727a05c4013d?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=880&q=80" alt="product designer">
                    <h1 class="text-lg text-gray-700"><?= $doctor['name'] ?></h1>
                    <h3 class="text-sm text-gray-400 ">Doctor</h3>
                    <p class="text-xs text-gray-400 mt-4"><?= $doctor['about'] ?></p>
                    <button class="bg-blue-600 px-8 py-2 mt-8 rounded-3xl text-gray-100 font-semibold uppercase tracking-wide">Follow</button>
                </div>

            <?php

            }
            ?>
            <div class="m-8">

                <a href="/doctors"><span class="bg-blue-500 rounded-full px-16 text-white py-3 text-xl ">More</span></a>

            </div>

        </div>

    </main>
    