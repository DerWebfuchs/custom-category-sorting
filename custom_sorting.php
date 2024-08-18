/**
 * Set up sorting function for WordPress categories in GeneratePress:
 * See: https://derwebfuchs.de/sortierfunktion-fur-wordpress-kategorien/
 */
function custom_sorting_setup() {
    // Überprüfe, ob es sich um eine Kategorieseite handelt und ob die Kategorie-ID 4, 6, 7, oder 167 ist
    if (is_category(array(4, 6, 7, 167))) {
        add_action('generate_before_main_content', 'custom_sorting_dropdown');
    }
}
add_action('wp', 'custom_sorting_setup');

function custom_sorting_dropdown() {
    if (is_category(array(4, 6, 7, 167))) {
        $current_sort = isset($_GET['sort_by']) ? sanitize_text_field($_GET['sort_by']) : 'date_desc';

        ob_start();
        ?>
        <form method="get" id="custom-sorting-form" style="margin-bottom: 20px;">
            <label for="sort_by">Sortieren nach:</label>
            <select name="sort_by" id="sort_by" onchange="this.form.submit()">
                <option value="date_desc" <?php selected($current_sort, 'date_desc'); ?>>Neueste zuerst</option>
                <option value="date_asc" <?php selected($current_sort, 'date_asc'); ?>>Älteste zuerst</option>
                <option value="title_asc" <?php selected($current_sort, 'title_asc'); ?>>Titel (A-Z)</option>
                <option value="title_desc" <?php selected($current_sort, 'title_desc'); ?>>Titel (Z-A)</option>
                
            </select>
        </form>
        <?php
        // Füge ein unsichtbares <p>-Tag ein, um das Layout zu bewahren
        echo '<p style="visibility: hidden;">Hier kannst du die Beiträge nach deinen Wünschen sortieren.</p>'; 
        echo ob_get_clean();
    }
}



function custom_sorting_query($query) {
    if ($query->is_main_query() && !is_admin() && is_category()) {
        if (isset($_GET['sort_by'])) {
            $sort_by = sanitize_text_field($_GET['sort_by']);

            switch ($sort_by) {
                case 'date_asc':
                    $query->set('orderby', 'date');
                    $query->set('order', 'ASC');
                    break;
                case 'date_desc':
                    $query->set('orderby', 'date');
                    $query->set('order', 'DESC');
                    break;
                case 'title_asc':
                    $query->set('orderby', 'title');
                    $query->set('order', 'ASC');
                    break;
                case 'title_desc':
                    $query->set('orderby', 'title');
                    $query->set('order', 'DESC');
                    break;
                case 'author_asc':
                    $query->set('orderby', 'author');
                    $query->set('order', 'ASC');
                    break;
                case 'author_desc':
                    $query->set('orderby', 'author');
                    $query->set('order', 'DESC');
                    break;
                default:
                    break;
            }
        }
    }
}
add_action('pre_get_posts', 'custom_sorting_query');
