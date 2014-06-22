<?php if(!class_exists('raintpl')){exit;}?><!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title><?php echo $title;?></title>
        <link rel="stylesheet" href="tpl/style.css">
    </head>
    <body>
        <h1><?php echo $title;?></h1>
        <table>
            <?php $header=$this->var['header']=1;?>

            <?php $counter1=-1; if( $table !== null && is_array($table) && sizeof($table) ) foreach( $table as $key1 => $value1 ){ $counter1++; ?>

            <tr class="<?php echo $value1['class'];?>">
                <?php $counter2=-1; if( $value1['content'] !== null && is_array($value1['content']) && sizeof($value1['content']) ) foreach( $value1['content'] as $key2 => $value2 ){ $counter2++; ?>

                    <?php if( $header == 1 ){ ?>

                    <th><?php echo $value2;?></th>
                    <?php }else{ ?>

                    <td><?php echo $value2;?></td>
                    <?php } ?>

                <?php } ?>

            </tr>
            <?php $header=$this->var['header']=0;?>

            <?php } ?>

        </table>
    </body>
</html>
