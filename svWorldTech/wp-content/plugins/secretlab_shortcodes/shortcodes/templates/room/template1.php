<div class="room-item <?php echo $hover_effect ?> ">
    <div class="room-info-wrapper">
		<?php echo $price; ?>
        <div class="room-title">
            <h4 class="title lines<?php echo $limit_t_lines ?> "><?php echo $item['post_title'] ?></h4>
        </div>
		<?php echo $descr ?>
        <div class="room-terms">
			<?php echo $room_terms ?>
        </div>
		<?php echo $book_button ?>
    </div>
    <div class="room-img-wrapper">
		<?php echo $image; ?>
        <div class="room-info">
            <div class="rdata col-sm-6">
				<?php echo Atiframebuilder_Room::get_room_guests_count( $item['ID'] ); ?>
            </div>
            <div class="rdata col-sm-6">
				<?php echo Atiframebuilder_Room::get_room_items_count( $item ); ?>
            </div>
        </div>
    </div>
</div>