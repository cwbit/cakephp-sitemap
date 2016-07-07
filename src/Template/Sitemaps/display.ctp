<table>
    <thead>
        <tr>
            <th><?= __('Location') ?></th>
            <th><?= __('Priority') ?></th>
            <th><?= __('Change Frequency') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($pages as $page) : ?>
        <tr>
            <td><?= $this->Html->link($page['loc'], $page['loc']) ?></td>
            <td><?= $page['priority'] ?></td>
            <td><?= $page['changefreq'] ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
