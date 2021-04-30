<section class="content_top" style="background-image: none; !important;">
    <?php
    include __DIR__ . '/myEditoBEslogan.php';
    ?>
    <div class="content">
        <table id="tableau" class="table table-sm table-dark table-hover" weight="400px">
            <tr>
                <th>N°</th>
                <th>Titre</th>
                <th>Description</th>
                <th>Type</th>
                <th>Sel</th>
            </tr>

            <?php
            $i = 1;
            foreach ($all_editos as $i => $edito):

                $i++;
                echo "<tr id='id" . (string)$i . "'>";
                echo "<td>" . $edito->getId() . "</td>";
                echo "<td >" . $edito->getTitre() . "</td>";
                echo "<td >" . $edito->getContenu() . "</td>";
                echo "<td >" . $edito->getType() . "</td>";
                echo "<td><input type='checkbox' id='suppr" . (string)$i . "' onclick='numeroL();' /></td>";
                echo "</tr>";

            endforeach;
            ?>
        </table>

    </div>
</section>


