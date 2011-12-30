<?php
/**
 * Stormlabs
 *
 * (c) Ernesto Jose Vargas Paz <ejosvp@gmail.com>
 */

namespace Storm\MediaBundle\Entity;

use Symfony\Component\HttpFoundation\File\UploadedFile;

interface EntityWithFileInterface
{
    /*
     * Returns the uploaded file
     * @return UploadedFile $file
     */
    public function getUploadedFile();

    /*
     * Returns the base name to use to save the file
     * @return string $file_base_name
     */
    public function getFileBaseName();

    /*
     * Sets the persisted file path
     * @param string $path
     */
    public function setPath($path);

    /*
     * returns the persisted file path
     * @return string $path
     */
    public function getPath();

    /*
     * Returns the upload dir
     * @return string $upload_dir
     */
    public function getUploadDir();

    /*
     * Returns the remove_file
     * @return boolean $upload_dir
     */
    public function getRemoveFile();

    /*
     * check file to remove
     * @param boolean $remove_file
     */
    public function setRemoveFile($remove_file);
}
