<?php
$this->layout('channel/call/layout', [
	'bodyClass' => 'channel-call',
    'title' => $this->channel->name,
    'meta_description' => $this->channel->subtitle,
    ]);

$this->section('channel-content');
?>

<?= $this->insert('channel/call/partials/main_info') ?>

<?= $this->insert('channel/call/partials/call_to_action') ?>

<?= $this->insert('channel/call/partials/projects') ?>

<?= $this->insert('channel/call/partials/posts_section') ?>

<?= $this->insert('channel/call/partials/program') ?>

<?= $this->insert('channel/call/partials/stories') ?>

<?= $this->insert('channel/call/partials/related_workshops') ?>

<?= $this->insert('channel/call/partials/resources') ?>

<?= $this->insert('channel/call/partials/map') ?>

<?= $this->insert('channel/call/partials/team') ?>

<?= $this->insert('channel/call/partials/sponsors') ?>

<?= $this->insert('channel/call/partials/modal_program') ?>

<?php $this->replace() ?>
