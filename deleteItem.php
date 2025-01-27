<?php
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the edited item details
    $editedItemName = $_POST['editItem'];
    $editedItemPrice = floatval($_POST['editPrice']);

    // Check if 'items' parameter is set in the URL
    if (isset($_GET['items'])) {
        $items = json_decode(urldecode($_GET['items']), true);

        // Find the item to edit
        foreach ($items as &$item) {
            if ($item['name'] == $editedItemName) {
                // Update the item price
                $item['price'] = $editedItemPrice;
            }
        }

        // Redirect back to the original page with updated items
        $updatedItems = urlencode(json_encode($items));
        $redirectUrl = "original_page.php?total=" . $_GET['total'] . "&items=" . $updatedItems;
        header("Location: $redirectUrl");
        exit;
    }
}

// If the form is not submitted or there's an issue, redirect back to the original page
header("Location: original_page.php");
exit;
?>
