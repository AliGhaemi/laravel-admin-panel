<?php

// php meilisearch-update-attributes.php

require __DIR__.'/vendor/autoload.php';

$client = new \MeiliSearch\Client(
    env('MEILISEARCH_HOST', 'http://localhost:7700'),
    env('MEILISEARCH_KEY')
);

// Modify this to the Model's name (for here table's name) for the newly added attributes
$postsIndex = $client->index('posts');

$existingAttributes = $postsIndex->getSortableAttributes();

// Modify this to the newly Added attributes
$newAttributes = array_merge($existingAttributes, [
    'description_length',
]);

$postsIndex->updateSortableAttributes($newAttributes);

echo 'Sortable attributes updated for the posts index!';
