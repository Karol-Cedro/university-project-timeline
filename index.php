<?php include_once 'config/init.php'; ?>
<?php include 'templates/header.php'; ?>
<style><?php include 'style/style.css'; ?></style>

<div id="visualization"></div>

<?php
$event = new Event();
$user = new User();
$events = [];
foreach ($event->getAllEvents() as $row) {
    $events[] = $row;
}
$users = [];
foreach ($user->getAllUsers() as $row) {
    $users[] = $row;
}
?>


<script type="text/javascript">

    var nicknames = <?php echo json_encode($users); ?>;
    var groups = new vis.DataSet();
    for (var g = 0; g < nicknames.length; g++) {
        groups.add({id: nicknames[g].id, content: nicknames[g].nickname});
    }
    // create a dataset with items
    var items = new vis.DataSet();
    var events = <?php echo json_encode($events); ?>;
    for (var i = 0; i < events.length; i++) {
        items.add({
            id: i,
            group: events[i].owner_id,
            content: events[i].name,
            start: events[i].start_date,
            end: events[i].end_date,
            type: 'box',
            title: `<p>${events[i].name}</p>
                    <p>${events[i].start_date}</p>
                    <p>${events[i].end_date}</p>
                    <p>${events[i].description}</p>
                    <p>${events[i].image}</p>`
        });
    }

    // create visualization
    var container = document.getElementById('visualization');
    var options = {
        showTooltips:true,
        height:'300px'
    };

    var timeline = new vis.Timeline(container);
    timeline.setOptions(options);
    timeline.setGroups(groups);
    timeline.setItems(items);

    const tooltip = document.getElementById('tooltip');
    const tooltipContent = document.getElementById('tooltip-content');

</script>
<?php include 'templates/footer.php'; ?>