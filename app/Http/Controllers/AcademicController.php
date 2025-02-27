<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;

class AcademicController extends Controller
{
    public function index(){
        $kindergarten_img = Content::where('description','card-kindergarten-1')->value('img_path'); 
        $kindergarten_desc = Content::where('description','kindergarten-description')->value('content'); 
        $primary_img = Content::where('description','card-primary-1')->value('img_path'); 
        $primary_desc = Content::where('description','primary-description')->value('content'); 
        $secondary_img = Content::where('description','card-secondary-1')->value('img_path'); 
        $secondary_desc = Content::where('description','secondary-description')->value('content'); 
        return view('pages.academic.overview', compact(['kindergarten_img','kindergarten_desc','primary_img','primary_desc','secondary_img','secondary_desc']));
    }

    public function kindergaten(){
        $contents = Content::where('page_id','3')->where('status','shown')->get();

        $campuses = [];
        $kindergarten = [];
        foreach ($contents as $content) {
            // Extract the type and identifier from the description
            if (preg_match('/^pages-(card|kindergarten)-(.*)$/', $content->description, $matches)) {
                $type = $matches[1]; // e.g., card, kindergarten
                $identifier = $matches[2]; // e.g., campus1-address, kindergarten-desc

                // Check if the identifier contains 'img'
                if (str_contains($identifier, 'img')) {
                    // Prepend 'storage/' to the content value for images
                    $content->content = $content->img_path;
                }

                // Organize campus data
                if ($type === 'card') {
                    if (preg_match('/^(campus\d+)-(.*)$/', $identifier, $campusMatches)) {
                        $campusNumber = $campusMatches[1]; // e.g., campus1
                        $field = $campusMatches[2]; // e.g., address, img, phone, title

                        // Initialize the campus array if it doesn't exist
                        if (!isset($campuses[$campusNumber])) {
                            $campuses[$campusNumber] = [];
                        }

                        // Add the content to the campus array
                        $campuses[$campusNumber][$field] = $content->content;
                    }
                }

                // Organize kindergarten data
                if ($type === 'kindergarten') {
                    $kindergarten[$identifier] = $content->content;
                }
            }
        }
        return view('pages.academic.kindergarten', compact(['campuses','kindergarten']));
    }

    public function primary(){
        $contents = Content::where('page_id','3')->where('status','shown')->get();
    
        $campuses = [];
        $primary = [];
        foreach ($contents as $content) {
            // Extract the type and identifier from the description
            if (preg_match('/^pages-primary-(card|images)-(.*)$/', $content->description, $matches)) {
                $type = $matches[1]; // e.g., card, images
                $identifier = $matches[2]; // e.g., campus1-title, 1, campus1-address
    
                // Handle images
                if ($type === 'images') {
                    // Prepend 'storage/' to the content value for images
                    $primary['images'][$identifier] = $content->img_path;
                }
    
                // Handle card data
                if ($type === 'card') {
                    if (preg_match('/^(campus\d+)-(.*)$/', $identifier, $campusMatches)) {
                        $campusNumber = $campusMatches[1]; // e.g., campus1
                        $field = $campusMatches[2]; // e.g., title, address, img, phone
    
                        // Initialize the campus array if it doesn't exist
                        if (!isset($campuses[$campusNumber])) {
                            $campuses[$campusNumber] = [];
                        }
                        // Add the content to the campus array
                        $campuses[$campusNumber][$field] = $content->content;
                        if ($field === 'image') {
                            // Prepend 'storage/' to the content value for images
                            $campuses[$campusNumber][$field] = $content->img_path;
                        }
                    }
                }
            }
    
            // Handle non-card and non-images primary data
            if (preg_match('/^pages-primary-(.*)$/', $content->description, $matches) && !str_contains($content->description, 'card') && !str_contains($content->description, 'images')) {
                $identifier = $matches[1]; // e.g., desc, title, etc.
                $primary[$identifier] = $content->content;
            }
        }
    
        return view('pages.academic.primary', compact(['primary', 'campuses']));
    }

    public function secondary(){
        $contents = Content::where('page_id','3')->where('status','shown')->get();
        $campuses = [];
        $primary = [];
        foreach ($contents as $content) {
            // Extract the type and identifier from the description
            if (preg_match('/^pages-secondary-(card|images)-(.*)$/', $content->description, $matches)) {
                $type = $matches[1]; // e.g., card, images
                $identifier = $matches[2]; // e.g., campus1-title, 1, campus1-address
    
                // Handle images
                if ($type === 'images') {
                    // Prepend 'storage/' to the content value for images
                    $secondary['images'][$identifier] = $content->img_path;
                }
    
                // Handle card data
                if ($type === 'card') {
                    if (preg_match('/^(campus\d+)-(.*)$/', $identifier, $campusMatches)) {
                        $campusNumber = $campusMatches[1]; // e.g., campus1
                        $field = $campusMatches[2]; // e.g., title, address, img, phone
    
                        // Initialize the campus array if it doesn't exist
                        if (!isset($campuses[$campusNumber])) {
                            $campuses[$campusNumber] = [];
                        }
                        // Add the content to the campus array
                        $campuses[$campusNumber][$field] = $content->content;
                        if ($field === 'image') {
                            // Prepend 'storage/' to the content value for images
                            $campuses[$campusNumber][$field] = $content->img_path;
                        }
                    }
                }
            }
    
            // Handle non-card and non-images primary data
            if (preg_match('/^pages-secondary-(.*)$/', $content->description, $matches) && !str_contains($content->description, 'card') && !str_contains($content->description, 'images')) {
                $identifier = $matches[1]; // e.g., desc, title, etc.
                $secondary[$identifier] = $content->content;
            }
        }
    
        return view('pages.academic.secondary', compact(['secondary', 'campuses']));
    }

    public function boarding(){
        $contents = Content::where('page_id', '3')->where('status', 'shown')->get();
        $campuses = [];
        $boarding = [];
    
        foreach ($contents as $content) {
            // Extract the type and identifier from the description
            if (preg_match('/^pages-boarding-(card|images)(.*)$/', $content->description, $matches)) {
                $type = $matches[1]; // e.g., card, images
                $identifier = $matches[2]; // e.g., campus1-title, 1, campus1-address
    
                // Handle images
                if ($type === 'images') {
                    // Prepend 'storage/' to the content value for images
                    $boarding['images'][$identifier] = $content->img_path;
                }
    
                // Handle card data
                if ($type === 'card') {
                    if (preg_match('/^(campus\d+)-(.*)$/', $identifier, $campusMatches)) {
                        $campusNumber = $campusMatches[1]; // e.g., campus1
                        $field = $campusMatches[2]; // e.g., title, address, img, phone
    
                        // Initialize the campus array if it doesn't exist
                        if (!isset($campuses[$campusNumber])) {
                            $campuses[$campusNumber] = [];
                        }
    
                        // Add the content to the campus array
                        $campuses[$campusNumber][$field] = $content->content;
    
                        // Handle image fields specifically
                        if ($field === 'image') {
                            $campuses[$campusNumber][$field] = $content->img_path;
                        }
                    }
                }
            }
    
            // Handle non-card and non-images boarding data
            if (preg_match('/^pages-boarding-(.*)$/', $content->description, $matches) && !str_contains($content->description, 'card') && !str_contains($content->description, 'images')) {
                $identifier = $matches[1]; // e.g., desc, title, etc.
                $boarding[$identifier] = $content->content;
            }
        }
    
        return view('pages.academic.boarding', compact(['boarding', 'campuses']));
    }
}
