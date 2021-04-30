<section class="content_top" style="background-image: none; !important;">
    <?php
    include __DIR__ . '/myFamilleSlogan.php';
    ?>
    <div class="content">
        <table id="tableau" class="table table-sm table-dark table-hover" weight="400px">
            <tr>
                <th>N°</th>
                <th>Libellé</th>
                <th>Type</th>
                <th>Sel</th>
            </tr>

            <?php
            $i = 1;
            foreach ($all_familles as $i => $famille):

                $i++;
                echo "<tr id='id" . (string)$i . "'>";
                echo "<td>" . $famille->getFamId() . "</td>";
                echo "<td >" . $famille->getLibelle() . "</td>";
                echo "<td >" . $famille->getType() . "</td>";
                echo "<td><input type='checkbox' id='suppr" . (string)$i . "' onclick='numeroL();' /></td>";
                echo "</tr>";

            endforeach;
            ?>
        </table>

    </div>
</section>


