<p><?php echo $tool->toolInfo['description']; ?></p>
<?php if(!empty($tool->toolInfo['dependencies'])): ?>
    <p style="font-size:12px; margin-top:5px;">
        <?php
        $required=[];
        $notRequired=[];
        foreach($tool->toolInfo['dependencies'] as $dep) {
            if (is_array($dep)) {
                $depTitles = [];
                foreach($dep as $toolDep){
                	if (empty($manager->tools[$toolDep])) {
                		continue;
                    }

                    $depTitles[] = "<a href='".ilab_admin_url("admin.php?page=media-cloud-settings&tab=$toolDep")."'>".$manager->tools[$toolDep]->toolInfo['name']."</a>";
                }

                $required[] = implode(' and/or ', $depTitles);
            } else {
                if (strpos($dep, '!') === 0) {
	                $notRequiredDep = trim($dep, '!');
	                if (!empty($manager->tools[$notRequiredDep])) {
		                $notRequired[] =  "<a href='".ilab_admin_url("admin.php?page=media-cloud-settings&tab=$dep")."'>".$manager->tools[$notRequiredDep]->toolInfo['name']."</a>";
	                }
                } else {
	                if (!empty($manager->tools[$dep])) {
                        $required[] =  "<a href='".ilab_admin_url("admin.php?page=media-cloud-settings&tab=$dep")."'>".$manager->tools[$dep]->toolInfo['name']."</a>";
                    }
                }
            }
        }
        $required=implode(', ',$required);
        if (!empty($required)) {
        	$required = '<strong>Requires:</strong> '.$required;
        }

        if (!empty($notRequired)) {
        	if (!empty($required)) {
		        $required .= '&nbsp; &nbsp; ';
            } else {
        		$required = '';
            }

            $notRequired=implode(', ',$notRequired);
            $required .= '<strong>Not compatible:</strong> '.$notRequired;
        }
        ?>
        <?php echo $required; ?>

    </p>
<?php endif; ?><?php /**PATH /Users/clecyo.freitas/Documents/Dev_DSA/institucional.adventistas.org.git/app/wp-content/plugins/ilab-media-tools/views/base/fields/enable-toggle-description.blade.php ENDPATH**/ ?>