<div class="grid-item <?php echo $hover_effect; ?> ">
    <div class="room-inner">
        <div class="room-img">
			<?php echo $image; ?>
			<?php echo $price; ?>
            <?php echo $rating; ?>
        </div>
        <div class="room-text">
            <div class="row">
                <div class="rdata col-lg-6">
					<?php echo Atiframebuilder_Room::get_room_guests_count( $item['ID'] ); ?>
                </div>
                <div class="rdata col-lg-6">
					<?php echo Atiframebuilder_Room::get_room_items_count( $item ); ?>
                </div>
            </div>
			<?php echo $title ?>
			<?php echo $descr ?>
			<?php echo $book_button ?>
        </div>
        <div class="room-terms">
			<?php echo $room_terms ?>
        </div>
    </div>
</div>