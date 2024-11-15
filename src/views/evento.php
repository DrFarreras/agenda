<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evento</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="/css/style.css">
    <script src="/src/js/main.js"></script>
</head>

<body>
<?php include 'navbar.php'; ?>

<div class="container-lg mt-5 event-container">
        <div class="event-content-left"">
        <h1 class="event-title""><?php echo htmlspecialchars($event['event_title']); ?></h1>
        <p class="event-description"><?php echo htmlspecialchars($event['event_description']); ?></p>
            <div class="event-image-container">
                <img src="<?php echo htmlspecialchars($images['url']); ?>" alt="Event Image" class="event-image">
            </div>
            <div class="event-characteristics">
                <h2 class="characteristics-title">Características</h2>
                <div class="event-info">
                    <div class="event-info-item">
                        <i class="bi bi-geo-alt"></i>
                        <span><?php echo htmlspecialchars($event['event_location']); ?></span>
                    </div>
                    <div class="event-info-item">
                        <i class="bi bi-calendar"></i>
                        <span><?php echo htmlspecialchars($event['date_start']); ?></span> <span> -</span>
                        <span><?php echo htmlspecialchars($event['date_end']); ?></span>
                    </div>
                    <div class="event-info-item">
                        <i class="bi bi-clock"></i>
                        <span><?php echo htmlspecialchars($event['event_time']); ?></span>
                    </div>
                    <div class="event-info-item">
                        <i class="bi bi-filter"></i>
                        <span><?php echo htmlspecialchars($event['filter']); ?></span>
                    </div>
                </div>
            </div>
        </div>
      <?php include 'footer.php'; ?>
</body>

</html>