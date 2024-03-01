<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('csss/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css" />
    <title>@yield('title', 'PawAdoptPaw')</title>
    <link rel="icon" href="assets/logo.png" type="image/x-icon">
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
</head>

<body>
    <!--Navbar-->
    @include('shared.nav')
    @yield('content')
    @include('shared.footer')
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

    <script>
        $(document).ready(function() {
            var notificationsWrapper = $('.dropdown-notifications');
            var notificationsCountElem = notificationsWrapper.find('i[data-count]');
            var notificationsCount = parseInt(notificationsCountElem.data('count'));
            var notifications = notificationsWrapper.find('ul.notification-dropdown-menu');


            var pusher = new Pusher('0496f1badaa049846379', {
                cluster: 'ap1'
            });

            var channel = pusher.subscribe('user.1');

            channel.bind('my-event', function(data) {

                // Update the notification count in the bell icon
                var notificationCount = parseInt($('.bi-bell').attr('data-count'));
                $('.bi-bell').attr('data-count', notificationCount + 1);
                $('.count-badge').text(notificationCount + 1);
                $('.notif-count').text(notificationCount + 1)
                // Increment notification count
                notificationsCount++;
                notificationsCountElem.attr('data-count', notificationsCount);
                notificationsWrapper.find('.notif-count').text(notificationsCount);

                // Construct new notification HTML
                var avatar = Math.floor(Math.random() * (71 - 20 + 1)) + 20;
                var newNotificationHtml = `
                    <li class="notification active">
                        <div class="media">
                            <div class="media-left">
                                <div class="media-object">
                                    <img src="https://api.adorable.io/avatars/71/${avatar}.png" class="img-circle" alt="50x50" style="width: 50px; height: 50px;">
                                </div>
                            </div>
                            <div class="media-body">
                                <strong class="notification-title">${data.pet_name}</strong>
                                <div class="notification-meta">
                                    <small class="timestamp">receive an adoption request</small>
                                </div>
                            </div>
                        </div>
                    </li>
                `;

                // Append new notification to the top of the list
                notifications.prepend(newNotificationHtml);
            });
        });
    </script>
</body>

</html>
