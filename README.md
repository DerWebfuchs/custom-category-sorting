# custom-category-sorting
 A WordPress snippet for custom sorting on category pages.

German
Dieses Plugin fügt eine benutzerdefinierte Sortierfunktion für bestimmte Kategorieseiten in WordPress hinzu. Es ermöglicht Benutzern, Beiträge in diesen Kategorien nach verschiedenen Kriterien wie Datum, Titel und Autor zu sortieren.
Funktionsweise

Das Plugin prüft, ob die aktuelle Seite eine Kategorieseite ist und ob die Kategorie-ID 4, 6, 7 oder 167 ist. Wenn dies der Fall ist, wird ein Dropdown-Menü zur Auswahl der Sortierreihenfolge angezeigt. Die verfügbaren Sortieroptionen sind:

    Neueste zuerst (Datum absteigend)
    Älteste zuerst (Datum aufsteigend)
    Titel (A-Z) (Titel aufsteigend)
    Titel (Z-A) (Titel absteigend)

Das Dropdown-Menü sendet eine GET-Anfrage, um die Sortiermethode auszuwählen, und die Beiträge werden entsprechend sortiert.
Installation

    Kopiere das Code-Snippet in eine neue PHP-Datei und speichere diese im wp-content/plugins-Verzeichnis deines WordPress-Installationsordners. Benenne die Datei beispielsweise custom-category-sorting.php.
    Aktiviere das Plugin in der WordPress-Admin-Oberfläche unter "Plugins".

Nutzung

Nachdem das Plugin aktiviert wurde, wird das Dropdown-Menü automatisch auf den Kategorieseiten mit den IDs 4, 6, 7 und 167 angezeigt. Benutzer können die Beiträge in diesen Kategorien nach den verfügbaren Optionen sortieren.
Anpassung

Falls du das Plugin für andere Kategorien oder mit anderen Sortieroptionen verwenden möchtest, kannst du die Kategorie-IDs im is_category-Aufruf sowie die Optionen im custom_sorting_dropdown und custom_sorting_query entsprechend anpassen.
// Beispiel: Ändere die Kategorie-IDs
if (is_category(array(4, 6, 7, 167))) {
    // Code...
}

// Beispiel: Füge eine neue Sortieroption hinzu
case 'author_asc':
    $query->set('orderby', 'author');
    $query->set('order', 'ASC');
    break;

English
Custom Category Sorting for WordPress

This plugin adds a custom sorting function for specific category pages in WordPress. It allows users to sort posts in these categories by various criteria such as date, title, and author.
How It Works

The plugin checks if the current page is a category page and if the category ID is 4, 6, 7, or 167. If so, a dropdown menu for selecting the sorting order is displayed. The available sorting options are:

    Newest First (Date Descending)
    Oldest First (Date Ascending)
    Title (A-Z) (Title Ascending)
    Title (Z-A) (Title Descending)

The dropdown menu submits a GET request to select the sorting method, and the posts are sorted accordingly.
Installation

    Copy the code snippet into a new PHP file and save it in the wp-content/plugins directory of your WordPress installation. Name the file something like custom-category-sorting.php.
    Activate the plugin in the WordPress admin dashboard under "Plugins."

Usage

Once the plugin is activated, the dropdown menu will automatically appear on category pages with IDs 4, 6, 7, and 167. Users can sort the posts in these categories according to the available options.
Customization

If you want to use the plugin for other categories or with different sorting options, you can modify the category IDs in the is_category call and the options in the custom_sorting_dropdown and custom_sorting_query functions accordingly.

// Example: Change the category IDs
if (is_category(array(4, 6, 7, 167))) {
    // Code...
}

// Example: Add a new sorting option
case 'author_asc':
    $query->set('orderby', 'author');
    $query->set('order', 'ASC');
    break;
