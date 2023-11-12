<?php include_once 'config/init.php'; ?>

<div class="text-center">
    <button class="btn btn-info" id="printPageButton" onClick="window.print();">Print</button>
</div>
<br>
<br>

<div id="visualization"></div>

<?php
$event = new Event();
$user = new User();
$category = new Category();
$events = [];
foreach ($event->getAllEvents() as $row) {
    $events[] = $row;
}
$users = [];
foreach ($user->getAllUsers() as $row) {
    $users[] = $row;
}
$categories = [];
foreach ($category->getAllCategories() as $row) {
    $categories[] = $row;
}

?>

<script type="text/javascript">
    function findRecordById(records, searchId) {
        for (let i = 0; i < records.length; i++) {
            if (records[i].id === searchId) {
                return records[i];
            }
        }
        return null;
    }

    var nicknames = <?php echo json_encode($users); ?>;
    var categories = <?php echo json_encode($categories); ?>;
    var groups = new vis.DataSet();
    for (var g = 0; g < nicknames.length; g++) {
        groups.add({id: nicknames[g].id, content: nicknames[g].nickname});
    }
    // create a dataset with items
    var items = new vis.DataSet();
    var events = <?php echo json_encode($events); ?>;
    for (var i = 0; i < events.length; i++) {
        let category_id = events[i].category_id;
        let category_name = findRecordById(categories, category_id).name;
        let category_color = findRecordById(categories, category_id).color;
            items.add({
                id: i,
                group: events[i].owner_id,
                content: events[i].name,
                start: events[i].start_date,
                end: events[i].end_date,
                type: 'box',
                title: `<p>Nazwa: ${events[i].name}</p>
                    <p>Data rozpoczęcia: ${events[i].start_date}</p>
                    <p>Data zakończenia: ${events[i].end_date}</p>
                    <p>Opis: ${events[i].description}</p>
                    <p>Kategoria: ${category_name}</p>`,
                style: `background-color: ${category_color};`
            });
    }

    // create visualization
    var container = document.getElementById('visualization');
    var options = {
        showTooltips: true,
        tooltip: {
            overflowMethod: 'cap'
        }
    };

    var timeline = new vis.Timeline(container);
    timeline.setOptions(options);
    timeline.setGroups(groups);
    timeline.setItems(items);

</script>