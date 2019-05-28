@extends('cliking-lara42::layout')
@section('content')
    <div class="container">
        <ul>
            <?php
            foreach ($days as $item) {
                ?>
                <li>
                    <a href="<?= URL::route('logger-day', ['day' => $item->day]) ?>">
                        <?= $item->day ?>
                    </a>
                </li>
                <?php
            }
            ?>
        </ul>
        <?= $days->links() ?>
    </div>

@endsection
