<?php
$file = fopen('contatos.txt', 'r');

$profiles = [];
$total_rows = 0;
while (!feof($file)) {
    ++$total_rows;
    $row = fgets($file, 1024);
    $row = trim($row);
    if (!empty($row) && $row!='-' && strtolower($row)!='seguidores' && !strpos($row, ' '))
        $profiles[] = (substr($row, 0, 1)=='@') ? str_ireplace('@', '', $row) : $row;
}
fclose($file);

$total_profiles = count($profiles);

echo 'Total de linhas no arquivo: '.$total_rows;
echo '<br>';
echo 'Total de perfis válidos: '.$total_profiles;
echo '<br><hr><br>';
?>

<table border="1">
    <thead>
        <tr>
            <th style="text-align: center;">#</th>
            <th>Perfil</th>
            <th>Link</th>
        </tr>
    </thead>
    <tbody>

        <?php for ($i=0;$i<$total_profiles;++$i) : ?>
            <tr>
                <td style="text-align: center;"><?php echo $i+1 ?></td>
                <td><?php echo $profiles[$i] ?></td>
                <td>
                    <a href="http://instagram.com/<?php echo $profiles[$i] ?>" target="_blank" rel="noopener noreferrer">Link</a>                    
                </td>
            </tr>
        <?php endfor ?>

    </tbody>
</table>