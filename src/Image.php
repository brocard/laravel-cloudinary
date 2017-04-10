<?php

namespace BrocardJr\Cloudinary;

use Illuminate\Config\Repository;

/**
 * Class Image helper for Cloudinary Api
 *
 * @package BrocardJr\Cloudinary
 * @author YBD <admin@brocardjr.com>
 */
class Image
{
    /**
     * @var mixed
     */
    protected $config;

    /**
     * @var array
     */
    protected $options = [];

    /**
     * @param Repository $config
     */
    public function __construct(Repository $config)
    {
        $this->config = $config->get('filesystems.disks.cloudinary');
        \Cloudinary::config($this->config);
        //get default options for cloudinary
        $this->getDefaultOptions();
    }

    /**
     *
     * @param $source
     * @param array $options
     * @return mixed|null|string
     */
    public function url($source, $options = [])
    {
        $options = array_merge($this->options, $options);
        return cloudinary_url($source, $options);
    }

    /**
     *
     * @param $source
     * @param array $options
     * @return string
     */
    public function tag($source, $options=[])
    {
        $options = array_merge($this->options, $options);
        return cl_image_tag($source, $options);
    }

    /**
     * @return string
     */
    public function defaultAvatar()
    {
        return 'https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm';
    }

    /**
     * @return array
     */
    protected function getDefaultOptions()
    {
        $this->options = [
            'sign_url' => true,
            'secure' => true,
            'format'    => 'jpg',
        ];
    }
}