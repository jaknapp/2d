function Trie()
{
   this.words = {};
}

Trie.prototype.add = function(word, value)
{
   var node = this.words;
   
   for(var i = 0; i < word.length; i++)
   {
      var letter = word.charAt(i);
      var next = null;
      
      if (!node.next)
      {
         node.next = {};
      }
      else
      {
         next = node.next[letter];
      }
      
      if (!next)
      {
         next = {};
         node.next[letter] = next;
      }
      
      node = next;
   }
   
   node.value = value;
};

Trie.prototype.remove = function(word)
{
   var node = this.words;
   var firstI = 0;
   var firstNode = null;
   
   for(var i = 0; i < word.length; i++)
   {
      var letter = word.charAt(i);
      var next = null;
      
      if (node.next)
      {
         next = node.next[letter];
      }
      
      // Word not found
      if (!next)
      {
         return;
      }
      
      var count = 0;
      
      if (next.next)
      {
         for(var j in next.next)
         {
            count++;
            
            if (count > 1)
            {
               break;
            }
         }
      }
      
      if (1 >= count && !firstNode && (!("value" in next) || i + 1 == word.length))
      {
         firstI = i;
         firstNode = node;
      }
      
      if (firstNode && (1 < count || (("value" in next) && (i + 1 != word.length))))
      {
         firstNode = null;
      }
      
      node = next;
   }
   
   // Word not found
   if (!("value" in node))
   {
      return;
   }
   
   delete node.value;
   
   if (node.next || !firstNode)
   {
      return;
   }
   
   node = firstNode;
   
   for(var i = firstI; i < word.length; i++)
   {
      var letter = word.charAt(i);
      var next = node.next[letter];
      delete node.next[letter];
      node = next;
   }
};

Trie.prototype.find = function(word)
{
   var node = this.words;
   
   for(var i = 0; i < word.length && node; i++)
   {
      var letter = word.charAt(i);
      
      if (node.next)
      {
         node = node.next[letter];
      }
      else
      {
         node = undefined;
      }
   }
   
   return node;
};

Trie.prototype.getWords = function(word)
{
   pWords = {list: []};
   word = word || "";
   var start = this.find(word);
   
   if (start)
   {
      this.getWordsRecursive(start, word, pWords);
   }
   
   return pWords.list;
};

Trie.prototype.getWordsRecursive = function(node, preffix, pWords)
{
   node = node || this.words;
   preffix = preffix || "";
   pWords = pWords || {list: []};
   
   if (!node.next || ("value" in node))
   {
      pWords.list.push(preffix);
   }
   
   if (!node.next)
   {
      return;
   }
   
   for(var i in node.next)
   {
      var nextPreffix = preffix + i;
      var nextNode = node.next[i];
      this.getWordsRecursive(nextNode, nextPreffix, pWords);
   }
};
