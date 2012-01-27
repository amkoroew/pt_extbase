<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2010 Michael Knoll <mimi@kaktusteam.de>
*  			Daniel Lienert <daniel@lienert.cc>
*  			
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 2 of the License, or
*  (at your option) any later version.
*
*  The GNU General Public License can be found at
*  http://www.gnu.org/copyleft/gpl.html.
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/

/**
 * Interface for nodes in a nested set tree
 *
 * TODO split this interface into nested-set related functionality and category-related functionality
 *
 * @package Category
 * @author Michael Knoll <mimi@kaktusteam.de>
 * @author Daniel Lienert <daniel@lienert.cc>
 */
interface Tx_PtExtbase_Category_NodeInterface {

    /*********************************************************************************************************
     * Getters and setters for advanced domain logic. NOT USED FOR PERSISTENCE!
     *********************************************************************************************************/
    
    /**
     * Setter for parent node
     *
     * @param Tx_PtExtbase_Category_NodeInterface $category
     */
    public function setParent(Tx_PtExtbase_Category_NodeInterface $category);
    
    
    
    /**
     * Getter for parent node
     *
     * @return Tx_PtExtbase_Category_NodeInterface
     */
    public function getParent();
    
    
    
    /**
     * Getter for child categories
     *
     * @return Tx_Extbase_Persistence_ObjectStorage
     */
    public function getChildren();
    
    
    
    /**
     * Get count of children recursively
     *
     * TODO is this really necessary for this interface?
     * 
     * @return int
     */
    public function getChildrenCount();
    
    
    
    /**
     * Returns level of category (0 if category is root). 
     * 
     * Level is equal to depth
     * of category in tree where root has depth 0.
     *
     * @return int
     */
    public function getLevel();
    
    
    
    /**
     * Returns sub-nodes in a flat list. The result is ordered 
     * in such a way that it reflects the structure of the tree (dfs):
     * 
     * cat 1
     * - cat 1.1
     * -- cat 1.1.1
     * -- cat 1.1.2
     * - cat 1.2
     * -- cat 1.2.1
     * -- cat 1.2.2
     * 
     * Will return 
     * 
     * cat 1
     * cat 1.1
     * cat 1.1.1
     * cat 1.1.2
     * cat 1.2
     * cat 1.2.1
     * cat 1.2.2
     *
     * @return Tx_Extbase_Persistence_ObjectStorage
     */
    public function getSubNodes();
    
    
    
    /*********************************************************************************************************
     * Domain logic
     *********************************************************************************************************/
    
    /**
     * Adds a child category to children at end of children
     *
     * @param Tx_PtExtbase_Category_NodeInterface $category
     */
    public function addChild(Tx_PtExtbase_Category_NodeInterface $category);
    
    
    
    /**
     * Adds a new child node after a given child node
     *
     * @param Tx_PtExtbase_Category_NodeInterface $newChildCategory
     * @param Tx_PtExtbase_Category_NodeInterface $categoryToAddAfter
     */
    public function addChildAfter(Tx_PtExtbase_Category_NodeInterface $newChildNode, Tx_PtExtbase_Category_NodeInterface $nodeToAddAfter);
    
    
    
    /**
     * Adds a new child category before a given child category
     *
     * @param Tx_PtExtbase_Category_NodeInterface $newChildCategory
     * @param Tx_PtExtbase_Category_NodeInterface $categoryToAddBefore
     * @param bool $updateLeftRight
     */
    public function addChildBefore(Tx_PtExtbase_Category_NodeInterface $newChildNode, Tx_PtExtbase_Category_NodeInterface $nodeToAddBefore);
    
    
    
    /**
     * Removes given child category
     *
     * @param Tx_PtExtbase_Category_NodeInterface $child
     * @param bool $updateLeftRight
     */
    public function removeChild(Tx_PtExtbase_Category_NodeInterface $child);
    
    
    
    /**
     * Returns true, if category has children
     *
     * @return bool
     */
    public function hasChildren();
    
    
    
    /**
     * Returns true, if category has a parent
     *
     * @return bool True, if category has parent category
     */
    public function hasParent();
    
    
    
    /**
     * Returns true, if node is root
     *
     * @return boolean True, if node is root
     */
    public function isRoot();
    
}
?>