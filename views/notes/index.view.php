<?php require base_path("views/partials/head.php"); ?>
<?php require base_path("views/partials/nav.php"); ?>
<?php require base_path("views/partials/banner.php"); ?>


<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <!-- Your content -->
        <!--            <p>Now you are on the notes page</p>-->
        <ul>

            <?php foreach ($notes as $note): ?>
                <li>

                    <a href="/note?id=<?= $note['note_id'] ?>" class="text-blue-500 hover:underline">
                        <?= htmlspecialchars($note['note']) ?>
                    </a>
                </li>

            <?php endforeach; ?>
        </ul>

    </div>
</main>


<?php require base_path("views/partials/footer.php"); ?>