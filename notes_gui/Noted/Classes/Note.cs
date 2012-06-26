using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

namespace Noted.Classes
{
    public class Note
    {
        #region Private Members

        private string _body;
        private string _name;
        
        // TODO At Some point implement storage of styling sheets

        private DateTime _dateCreated;
        private DateTime _lastModified;

        #endregion

        #region Properties

        public string Body
        {
            get { return _body; }
            set { _body = value; }
        }

        public string Name
        {
            get { return _name; }
            set { _name = value; }
        }

        public DateTime DateCreated
        {
            get { return _dateCreated; }
            set { _dateCreated = value; }
        }

        public DateTime LastModified
        {
            get { return _lastModified; }
            set { _lastModified = value; }
        }

        #endregion

        #region Methods

        public override string ToString()
        {
            return Name;
        }

        #endregion

    }
}
