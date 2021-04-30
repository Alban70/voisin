<section class="content_top" style="background-image: none; !important;">
    <?php
    include __DIR__ . '/myMembreSlogan.php';
    ?>
    <div class="content">
        <table id="tableau" class="table table-sm table-dark table-hover" weight="400px">
            <tr>
                <th>N°</th>
                <th>Société</th>
                <th>Adresse</th>
                <th>Code postal</th>
                <th>Ville</th>
                <th>Sel</th>
            </tr>

            <?php
            $i = 1;
            foreach ($membres as $i => $membre):

                $i++;
                echo "<tr id='id" . (string)$i . "'>";
                echo "<td>" . $membre->getSocId() . "</td>";
                echo "<td >" . $membre->getNom() . "</td>";
                echo "<td >" . $membre->getAdresse1() . "</td>";
                echo "<td >" . $membre->getCp() . "</td>";
                echo "<td >" . $membre->getVille() . "</td>";
                echo "<td><input type='checkbox' id='suppr" . (string)$i . "' onclick='numeroL();' /></td>";
                echo "</tr>";

            endforeach;
            ?>
        </table>

    </div>
</section>


