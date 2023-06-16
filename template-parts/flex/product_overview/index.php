<?php
global $flex_content;
$stone_images = $flex_content['stone_images'];?>
<div class = "stone_images">
    <?php
        foreach ($stone_images as $stone_image) {
            $img = $stone_image['stone_image']['url'];?>
            <img src = "<?php echo $img; ?>" />
            <?php
        }
?>
</div>
<?php