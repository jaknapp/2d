function Cmds()
{
   this.trie = new Trie();
   
   var wordParam = "";

   $(document).keydown(function(event)
   {
      console.log(event);
      console.log(String.fromCharCode(event.which));
      
      if (8 === event.which)
      {
         event.preventDefault();
         
         if (0 !== wordParam.length)
         {
            wordParam = wordParam.substring(0, wordParam.length - 1);
         }
      }
      else if (13 === event.which)
      {
         wordParam += "\n";
      }
      else
      {
         wordParam += String.fromCharCode(event.which);
      }
      
      var wordElement = document.getElementById("word");
      wordElement.innerHTML = ""
      var wordTn = document.createTextNode(wordParam);
      wordElement.appendChild(wordTn);
      
      var words = cAll.trie.getWords(wordParam);
      
      console.log(wordParam);
      console.log(words);
      
      var wordsElement = document.getElementById("words");
      wordsElement.innerHTML = "";
      
      for(var i = 0; i < words.length; i++)
      {
         var w = words[i];
         var p = document.createElement("p");
         var tn = document.createTextNode(w);
         p.appendChild(tn);
         wordsElement.appendChild(p);
      }
   });
}

Cmds.prototype.add = function()
{
   for(var i = 0; i < arguments.length; i++)
   {
      var arg = arguments[i];
      
      if ("string" === typeof arg)
      {
         arg = {
            key: arg,
            value: arg
         };
      }
      
      if ("object" !== typeof arg)
      {
         continue;
      }
      
      if (Array.isArray(arg))
      {
         for(var j = 0; j < arg.length; j++)
         {
            this.add(arg[j]);
         }
      }
      else if (arg.getCmds)
      {
         this.add(arg.getCmds());
      }
      else
      {
         this.trie.add(arg.key, arg.value);
      }
   }
};

Cmds.prototype.remove = function()
{
   for(var i = 0; i < arguments.length; i++)
   {
      var arg = arguments[i];
      
      if ("object" === typeof arg)
      {
         if (Array.isArray(arg))
         {
            for(var j = 0; j < arg.length; j++)
            {
               this.remove(arg[j]);
            }
         }
         else if (arg.getCmds)
         {
            this.remove(arg.getCmds());
         }
      }
      else if ("string" === typeof arg)
      {
         this.trie.remove(arg);
      }
   }
};

Cmds.prototype.getCmds = function()
{
   return this.trie.getWords();
};