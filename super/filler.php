<?php
require '_cred_main.php';
if(isset($_GET['selected'])){
    $filler = $_GET['selected'];
    $sql ="SELECT * FROM projects_list WHERE id ='$filler'"; 
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $alpha=$beta=$published=$ongoing=$discontinued=$hidden="";
            switch($row['stage']){
                case 'Alpha':$alpha="selected";break;
                case 'Beta':$beta="selected";break;
                case 'Published':$published="selected";break;
                case 'Ongoing':$ongoing="";break;
                case 'Discontinued':$discontinued="selected";break;
                case 'Hidden':$hidden="selected";break;
            }
            $website=$webapp=$pwa=$androidapp=$iosapp=$api=$desktopapp="";
            $uncategorized="selected";
            switch($row['category']){
                case 'Website':$website="selected";break;
                case 'Web App':$webapp="selected";break;
                case 'Progressive Web App (PWA)':$pwa="selected";break;
                case 'Android App':$androidapp="";break;
                case 'iOS App':$iosapp="selected";break;
                case 'API':$api="selected";break;
                case 'Desktop App':$desktopapp="selected";break;
                case 'Uncategorised':$uncategorized="selected";break;
            }

        echo '<div class="form-group">
        <label for="name">Project Name</label>
        <input class="form-control" name="name_update" id="name" type="text" value="'.$row['name'].'" placeholder="Project Name" required="">
        </div>
        <div class="form-group">
        <label for="url">URL of Project</label>
        <input class="form-control" name="url_update" id="url" type="url" value="'.$row['link'].'" placeholder="URL of Project" required="">
        </div>
        <div class="form-group">
        <label for="url">Project Lead</label>
        <input class="form-control" type="text" placeholder="Project Lead" value="'.$row['publisher'].'"required="" name="project_lead_update" id="project_lead></div>
        <div class="form-group">
        <label for="stage">Stage</label>
        <select class="form-control" name="stage_update" id="stage">
        <option value="Alpha" '.$alpha.'>Alpha</option>
        <option value="Beta" '.$beta.'>Beta</option>
        <option value="Ongoing" '.$ongoing.'>Ongoing</option>
        <option value="Published" '.$published.'>Published</option>
        <option value="Discontinued" '.$discontinued.'>Discontinued</option>
        <option value="Hidden" '.$hidden.'>Hidden</option>
        </select></div>
        <div class="form-group">
        <label for="stage">Project Category</label>
        <select class="form-control" name="category_update" id="category">
        <option value="Website" '.$website.'>Website</option>
        <option value="Web App" '.$webapp.'>Web App</option>
        <option value="Progressive Web App (PWA)" '.$pwa.'>Progressive Web App (PWA)</option>
        <option value="Android App" '.$androidapp.'>Android App</option>
        <option value="iOS App" '.$iosapp.'>iOS App</option>
        <option value="API" '.$api.'>API</option>
        <option value="Desktop App" '.$desktopapp.'>Desktop App</option>
        <option value="Uncategorised" '.$uncategorized.'>Uncategorised</option>
        </select></div>
        <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" name="description_update" id="description" placeholder="Description" rows="10" required="">'.$row['description'].'</textarea></div>
        <div class="form-group"><button class="btn btn-primary" type="submit" name="submit">Update app</button></div>';
        }
    }
}
