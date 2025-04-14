<?php require base_path("views/partials/head.php"); ?>
<?php require base_path("views/partials/nav.php"); ?>
<?php require base_path("views/partials/banner.php"); ?>


<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">

        <form method="post" action="/note">
            <div class="space-y-12">
                <div>

                    <div class="col-span-full">
                        <label for="note" class="block text-sm/6 font-medium text-gray-900">Body</label>
                        <div class="mt-2">
                            <textarea name="note" id="note" rows="3" placeholder="Here's an idea for a note..."
                                      class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                            ><?= $note['note'] ?></textarea>

                            <p class='text-red-500 text-xs mt-2'><?= (isset($errors['note'])) ? "{$errors['note']}" : ""; ?></p>


                        </div>

                    </div>


                    <div class="mt-6 flex items-center justify-end gap-x-6">
                        <!--                        <button type="button" class="text-sm/6 font-semibold text-gray-900">Cancel</button>-->
                        <a href="/notes"
                           class="rounded-md bg-gray-500 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Cancel</a>

                        <button type="submit"
                                class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                            Updae
                        </button>
                    </div>

                </div>
        </form>

    </div>
</main>
<?php require base_path("views/partials/footer.php"); ?>
