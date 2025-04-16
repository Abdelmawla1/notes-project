<?php require base_path("views/partials/head.php"); ?>
<?php require base_path("views/partials/nav.php"); ?>
<?php require base_path("views/partials/banner.php"); ?>


    <main>
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <p class="mb-6">
                <a href="/notes" class="text-blue-500 underline">go back...</a>
            </p>

            <p><?= htmlspecialchars($note['note']) ?></p>


            <div class="mt-6 flex flex-row justify-items-center items-center gap-4">
                <div>
                    <a href="/note/edit?id=<?= $note['note_id'] ?>"
                       class="rounded-md bg-gray-500 px-4 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Edit</a>

                </div>

                <div>
                    <form method="post">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="note_id" value="<?= $note['note_id']; ?>">
                        <button  class="rounded-md bg-transparent px-2 py-2 text-sm font-semibold text-red-500 shadow-xs hover:bg-red-500 hover:text-white focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Delete</button>
                    </form>

                </div>

            </div>

        </div>
    </main>

<?php require base_path("views/partials/footer.php"); ?>