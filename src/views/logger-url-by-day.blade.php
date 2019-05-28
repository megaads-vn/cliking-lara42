@extends('cliking-lara42::layout')
@section('content')

    <div class="container">
        <ul class="nav nav-pills">
            <li role="presentation"><a href="<?= URL::route('logger-day', ['day' => $day]) ?>">Logs by Ip</a></li>
            <li role="presentation" class="active"><a href="<?= URL::route('logger-url-day', ['day' => $day]) ?>">Logs by Url</a></li>
        </ul>

        <table class="table table-bordered" style="margin-top: 10px;">
            <tr>
                <th>#</th>
                <th>Request Uri</th>
                <th>Count</th>
            </tr>
            <?php
                $i = 1;
                foreach($accessGroup as $access) {
                    ?>
                    <tr>
                        <td><?= $i++ ?></td>
                        <td>
                            <a href="<?= URL::route('logger-url', ['crc32' => $access->uri_crc32, 'day' => $day]) ?>">
                                <?= $access->request_uri ?>
                            </a>
                        </td>
                        <td><?= $access->count ?></td>
                    </tr>
                    <?php
                }
            ?>
        </table>
        <?= $accessGroup->links() ?>

    </div>

@endsection
