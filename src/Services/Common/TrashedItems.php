<?php
/**
 * Created by PhpStorm.
 * User: henrikmikkelsen
 * Date: 20/01/15
 * Time: 22.19
 */

namespace Romby\Box\Services\Common;


trait TrashedItems {

    /**
     * Get the given item that has been trashed.
     *
     * @param int    $id    the id of the item.
     * @param string $token the OAuth token.
     * @return array the folder.
     */
    public function getTrashed($id, $token)
    {
        return $this->getQuery($this->getFullUrl($this->getBaseServiceUrl() . $id . '/trash'), $token);
    }

    /**
     * Permanently delete the given item.
     *
     * @param int    $id    the id of the item.
     * @param string $token the OAuth token.
     * @return void
     */
    public function deleteTrashed($id, $token)
    {
        $this->deleteQuery($this->getFullUrl($this->getBaseServiceUrl() . $id . '/trash'), $token);
    }

    /**
     * Restore the given item from trash.
     *
     * @param int    $id     the id of the item.
     * @param string $token  the OAuth token.
     * @param string $name   the new name of the item.
     * @param int    $parent the id of the folder to place the restored folder in.
     * @return array the folder.
     */
    public function restoreTrashed($id, $token, $name, $parent)
    {
        $options = [
            'json' => ['name' => $name, 'parent' => ['id' => $parent]]
        ];

        return $this->postQuery($this->getFullUrl($this->getBaseServiceUrl() . $id), $token, $options);
    }

    /**
     * Perform a DELETE query to the given url.
     *
     * @param string $url     the url to send the query to.
     * @param string $token   the OAuth token.
     * @param array  $options the options to send with the request.
     * @return void
     */
    abstract protected function deleteQuery($url, $token, $options = []);

    /**
     * Perform a POST query to the given url.
     *
     * @param string      $url     the url to send the query to.
     * @param string      $token   the OAuth token.
     * @param array       $options the options to send with the request.
     * @param string|null $file    the path to a file to send with the query.
     * @return array the response to the query.
     */
    abstract protected function postQuery($url, $token, $options = [], $file = null);

    /**
     * Perform a GET query to the given url.
     *
     * @param string $url     the url to send the query to.
     * @param string $token   the OAuth token.
     * @param array  $options the options to send with the request.
     * @return array the response to the query.
     */
    abstract protected function getQuery($url, $token, $options = []);

    /**
     * Get the full url for the given path.
     *
     * @param string $path the path.
     * @return string the full url.
     */
    abstract protected function getFullUrl($path);

    /**
     * Get the base service url.
     *
     * @return string the base service url.
     */
    abstract protected function getBaseServiceUrl();

}
